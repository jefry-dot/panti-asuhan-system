# 🚀 Panduan CI/CD Deployment ke VPS

Dokumentasi lengkap untuk setup otomatis deployment ke VPS menggunakan GitHub Actions.

## 📋 Prasyarat

- Repository GitHub (sudah ada)
- VPS dengan akses SSH
- Domain sudah pointing ke VPS (alzaelrohmah.my.id)
- PHP 8.2, Composer, Node.js sudah terinstall di VPS

## 🔧 Setup di VPS

### 1. Generate SSH Key Pair (di lokal)

Jika belum punya SSH key untuk deployment:

```bash
# Generate SSH key khusus untuk deployment
ssh-keygen -t ed25519 -C "github-actions-deploy" -f ~/.ssh/github_deploy

# Ini akan generate 2 file:
# - github_deploy (private key) -> untuk GitHub Secrets
# - github_deploy.pub (public key) -> untuk VPS
```

### 2. Setup SSH di VPS

Login ke VPS dan jalankan:

```bash
# Login ke VPS
ssh user@your-vps-ip

# Tambahkan public key ke authorized_keys
echo "ISI_DARI_github_deploy.pub" >> ~/.ssh/authorized_keys

# Set permissions
chmod 600 ~/.ssh/authorized_keys
chmod 700 ~/.ssh

# Clone repository (jika belum)
cd /var/www
git clone https://github.com/USERNAME/panti-asuhan-system.git

# Set ownership ke www-data
sudo chown -R www-data:www-data panti-asuhan-system

# Atau kalau user kamu yang manage:
sudo chown -R $USER:www-data panti-asuhan-system

# Copy .env file
cd panti-asuhan-system
cp .env.example .env

# Edit .env sesuai production settings
nano .env

# Install dependencies pertama kali
composer install --no-dev
npm install && npm run build
php artisan key:generate
php artisan migrate --force

# Buat deploy.sh executable
chmod +x deploy.sh
```

### 3. Setup Sudoers (opsional, untuk restart PHP-FPM tanpa password)

Jika ingin script bisa restart PHP-FPM otomatis:

```bash
sudo visudo

# Tambahkan baris ini di bagian bawah (ganti 'username' dengan user VPS kamu):
username ALL=(ALL) NOPASSWD: /bin/systemctl restart php8.2-fpm
```

## 🔑 Setup GitHub Secrets

1. Buka repository di GitHub
2. Go to: **Settings** → **Secrets and variables** → **Actions**
3. Klik **New repository secret** dan tambahkan secrets berikut:

| Secret Name | Value | Keterangan |
|------------|-------|------------|
| `VPS_SSH_PRIVATE_KEY` | Isi dari file `~/.ssh/github_deploy` (private key) | Full content termasuk `-----BEGIN` dan `-----END` |
| `VPS_HOST` | IP address atau domain VPS | Contoh: `123.456.789.0` atau `alzaelrohmah.my.id` |
| `VPS_USER` | Username SSH VPS | Contoh: `root` atau `ubuntu` |
| `VPS_PATH` | Path ke project di VPS | Contoh: `/var/www/panti-asuhan-system` |

### Cara copy private key:

**Windows (PowerShell):**
```powershell
Get-Content ~/.ssh/github_deploy | clip
```

**Linux/Mac:**
```bash
cat ~/.ssh/github_deploy | pbcopy  # Mac
cat ~/.ssh/github_deploy | xclip -selection clipboard  # Linux
```

Atau buka file manual dan copy semua isinya.

## 🧪 Testing Deployment

### Test 1: Manual Trigger

1. Buka repository di GitHub
2. Go to: **Actions** tab
3. Pilih workflow **Deploy to VPS**
4. Klik **Run workflow** → pilih branch `main` → **Run workflow**
5. Monitor progress di log

### Test 2: Push Trigger

```bash
# Buat perubahan kecil
echo "# Test deployment" >> README.md
git add README.md
git commit -m "test: trigger deployment"
git push origin main

# Cek di GitHub Actions tab, workflow akan otomatis jalan
```

## 📁 File Structure

```
panti-asuhan-system/
├── .github/
│   └── workflows/
│       └── deploy.yml          # GitHub Actions workflow
├── deploy.sh                    # Script deployment di VPS
├── DEPLOYMENT.md               # File ini
└── ...
```

## 🔄 Workflow Deployment

1. **Push ke branch `main`** → GitHub Actions trigger
2. **GitHub Actions** → Connect ke VPS via SSH
3. **VPS** → Jalankan `deploy.sh`:
   - Pull latest code
   - Install dependencies (Composer & NPM)
   - Build assets
   - Run migrations
   - Clear & cache config/routes/views
   - Restart PHP-FPM
   - Restart queue workers

## ⚙️ Customisasi

### Tambah Branch Lain untuk Deploy

Edit `.github/workflows/deploy.yml`:

```yaml
on:
  push:
    branches:
      - main
      - production  # tambah branch lain
```

### Disable Auto Deploy (Manual Only)

Edit `.github/workflows/deploy.yml`, hapus bagian `push:`:

```yaml
on:
  workflow_dispatch:  # Hanya manual trigger
```

### Notifikasi Slack/Discord

Tambahkan step notifikasi di `.github/workflows/deploy.yml`:

```yaml
- name: Notify Slack
  if: always()
  uses: 8398a7/action-slack@v3
  with:
    status: ${{ job.status }}
    webhook_url: ${{ secrets.SLACK_WEBHOOK }}
```

## 🐛 Troubleshooting

### Error: Permission denied (publickey)

- Pastikan private key sudah ditambahkan ke GitHub Secrets
- Pastikan public key sudah ditambahkan ke `~/.ssh/authorized_keys` di VPS
- Cek format private key (harus lengkap dengan header/footer)

### Error: deploy.sh not found

```bash
# Di VPS, pastikan file ada dan executable
cd /var/www/panti-asuhan-system
ls -la deploy.sh
chmod +x deploy.sh
```

### Error: composer/npm command not found

- Pastikan Composer dan Node.js/NPM sudah terinstall di VPS
- Cek PATH environment variable

### Error: Permission denied saat restart PHP-FPM

- Setup sudoers seperti di langkah 3 di atas
- Atau comment out baris restart PHP-FPM di `deploy.sh`

### Storage/Cache Permission Issues

```bash
# Di VPS:
cd /var/www/panti-asuhan-system
sudo chmod -R 775 storage bootstrap/cache
sudo chown -R www-data:www-data storage bootstrap/cache
```

## 📊 Monitoring

### Cek Deployment Logs

- GitHub: **Actions** tab → Pilih workflow run
- VPS: `tail -f /var/log/nginx/alzaelrohmah-error.log`

### Cek Status Services

```bash
# PHP-FPM
sudo systemctl status php8.2-fpm

# Nginx
sudo systemctl status nginx

# Queue Worker (jika pakai)
php artisan queue:work --daemon
```

## 🔒 Security Tips

1. **Jangan commit `.env` file** (sudah di `.gitignore`)
2. **Gunakan dedicated SSH key** untuk deployment (jangan pakai personal key)
3. **Limit SSH key permissions** di VPS (bisa pake `command=` di authorized_keys)
4. **Enable 2FA** di GitHub account
5. **Rotate SSH keys** secara berkala

## 📚 Resources

- [GitHub Actions Documentation](https://docs.github.com/en/actions)
- [Laravel Deployment](https://laravel.com/docs/12.x/deployment)
- [Nginx Configuration](https://nginx.org/en/docs/)

---

**Happy Deploying! 🎉**

Jika ada masalah, cek GitHub Actions logs atau error logs di VPS.
