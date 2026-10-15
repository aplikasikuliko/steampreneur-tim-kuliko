'use strict';

/**
 * Smoke tests for the PHP KULIKO project (projek_kuliko), not the HTML/CSS/JS PWA.
 * Run from the project root:
 *   node --test tests/smoke.test.cjs
 *
 * Requirements: Node.js and PHP CLI must be installed and available on PATH.
 * These checks validate project files and PHP syntax; they do not test database
 * connectivity, login flows, or business calculations end-to-end.
 */

const test = require('node:test');
const assert = require('node:assert/strict');
const fs = require('node:fs');
const path = require('node:path');
const { spawnSync } = require('node:child_process');

function findProjectRoot() {
  const candidates = [
    process.cwd(),
    path.resolve(__dirname, '..'),
    path.resolve(__dirname, '../projek_kuliko'),
  ];
  for (const dir of candidates) {
    if (fs.existsSync(path.join(dir, 'koneksi.php')) &&
        fs.existsSync(path.join(dir, 'kuliko.sql'))) return dir;
  }
  throw new Error(
    'Folder proyek PHP KULIKO tidak ditemukan. Letakkan tests/smoke.test.cjs di folder ' +
    'projek_kuliko/ yang berisi koneksi.php dan kuliko.sql, lalu jalankan dari folder tersebut.'
  );
}

const root = findProjectRoot();
const requiredFiles = [
  'koneksi.php',
  'kuliko.sql',
  'register.php',
  'produk.php',
  'hpp.php',
  'analisis.php',
  'laporan.php',
];

// index.php and login.php vary between the uploaded archive versions, so either entry point is valid.
const entryPointCandidates = ['index.php', 'login.php', 'dashboard.php'];

function phpAvailable() {
  const result = spawnSync('php', ['-v'], { encoding: 'utf8' });
  return !result.error && result.status === 0;
}

const hasPhp = phpAvailable();

test('struktur proyek PHP KULIKO tersedia', () => {
  for (const relativePath of requiredFiles) {
    assert.ok(
      fs.existsSync(path.join(root, relativePath)),
      `File wajib tidak ditemukan: ${relativePath}`
    );
  }
  assert.ok(
    entryPointCandidates.some((name) => fs.existsSync(path.join(root, name))),
    `Tidak ditemukan halaman awal (${entryPointCandidates.join(', ')})`
  );
});

test('file konfigurasi database tidak kosong', () => {
  const configPath = path.join(root, 'koneksi.php');
  const config = fs.readFileSync(configPath, 'utf8');
  assert.ok(config.trim().length > 0, 'koneksi.php kosong');
  assert.match(config, /<\?php/i, 'koneksi.php tidak tampak sebagai file PHP');
});

test('file SQL database tersedia dan tidak kosong', () => {
  const sqlPath = path.join(root, 'kuliko.sql');
  const sql = fs.readFileSync(sqlPath, 'utf8');
  assert.ok(sql.trim().length > 0, 'kuliko.sql kosong');
  assert.match(sql, /\b(CREATE|INSERT|ALTER|USE|DROP)\b/i,
    'kuliko.sql tidak berisi perintah SQL yang dikenali');
});

test('seluruh file PHP lolos pemeriksaan sintaks PHP CLI', { skip: !hasPhp && 'PHP CLI tidak ditemukan di PATH' }, () => {
  const phpFiles = [];
  function walk(dir) {
    for (const entry of fs.readdirSync(dir, { withFileTypes: true })) {
      // Avoid traversing dependencies or version-control folders if present.
      if (entry.isDirectory() && ['.git', 'vendor', 'node_modules'].includes(entry.name)) continue;
      const fullPath = path.join(dir, entry.name);
      if (entry.isDirectory()) walk(fullPath);
      else if (entry.isFile() && entry.name.toLowerCase().endsWith('.php')) phpFiles.push(fullPath);
    }
  }
  walk(root);
  assert.ok(phpFiles.length > 0, 'Tidak ada file PHP untuk diperiksa');

  const failures = [];
  for (const file of phpFiles) {
    const result = spawnSync('php', ['-l', file], { encoding: 'utf8' });
    if (result.status !== 0) {
      failures.push(`${path.relative(root, file)}\n${result.stdout || ''}${result.stderr || ''}`);
    }
  }
  assert.deepEqual(failures, [], `Ditemukan kesalahan sintaks PHP:\n${failures.join('\n\n')}`);
});

test('aset gambar yang direferensikan proyek tersedia', () => {
  const imageDir = path.join(root, 'img');
  assert.ok(fs.existsSync(imageDir) && fs.statSync(imageDir).isDirectory(), 'Folder img/ tidak ditemukan');
  const imageFiles = fs.readdirSync(imageDir).filter((name) => /\.(png|jpe?g|gif|webp|svg)$/i.test(name));
  assert.ok(imageFiles.length > 0, 'Tidak ada aset gambar di folder img/');
});
