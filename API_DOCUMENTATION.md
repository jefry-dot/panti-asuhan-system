# API Documentation - Panti Asuhan System

## Base URL
```
http://your-vps-domain.com/api
```

## Authentication
API menggunakan Laravel Sanctum dengan Bearer Token authentication.

### Headers untuk Protected Routes
```
Accept: application/json
Authorization: Bearer {your-token}
```

---

## Authentication Endpoints

### 1. Register
**POST** `/api/auth/register`

**Request Body:**
```json
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123",
  "password_confirmation": "password123"
}
```

**Response:**
```json
{
  "success": true,
  "message": "User registered successfully",
  "data": {
    "user": {
      "id": 1,
      "name": "John Doe",
      "email": "john@example.com"
    },
    "token": "1|abcdef..."
  }
}
```

### 2. Login
**POST** `/api/auth/login`

**Request Body:**
```json
{
  "email": "john@example.com",
  "password": "password123"
}
```

**Response:**
```json
{
  "success": true,
  "message": "Login successful",
  "data": {
    "user": {
      "id": 1,
      "name": "John Doe",
      "email": "john@example.com",
      "role": "user"
    },
    "token": "2|ghijkl..."
  }
}
```

### 3. Logout
**POST** `/api/auth/logout`
*Requires Authentication*

**Response:**
```json
{
  "success": true,
  "message": "Logged out successfully"
}
```

### 4. Get Current User
**GET** `/api/user`
*Requires Authentication*

**Response:**
```json
{
  "id": 1,
  "name": "John Doe",
  "email": "john@example.com",
  "role": "user"
}
```

---

## Berita (News) Endpoints

### 1. Get All Berita (Public)
**GET** `/api/berita?per_page=10`

**Response:**
```json
{
  "success": true,
  "data": {
    "current_page": 1,
    "data": [
      {
        "id": 1,
        "judul": "Berita Terbaru",
        "slug": "berita-terbaru",
        "konten": "Isi berita...",
        "gambar": "berita/image.jpg",
        "penulis": "Admin",
        "tanggal_publikasi": "2025-01-01"
      }
    ],
    "total": 10
  }
}
```

### 2. Get Single Berita (Public)
**GET** `/api/berita/{id}`

### 3. Create Berita (Admin Only)
**POST** `/api/admin/berita`
*Requires Authentication & Admin Role*

**Request (multipart/form-data):**
- judul (string, required)
- konten (string, required)
- gambar (file, optional, max 2MB)
- penulis (string, required)
- tanggal_publikasi (date, required)

### 4. Update Berita (Admin Only)
**PUT/POST** `/api/admin/berita/{id}`
*Requires Authentication & Admin Role*

### 5. Delete Berita (Admin Only)
**DELETE** `/api/admin/berita/{id}`
*Requires Authentication & Admin Role*

---

## Acara (Events) Endpoints

### 1. Get All Acara (Public)
**GET** `/api/acara?per_page=10`

### 2. Get Single Acara (Public)
**GET** `/api/acara/{id}`

### 3. Create Acara (Admin Only)
**POST** `/api/admin/acara`
*Requires Authentication & Admin Role*

**Request (multipart/form-data):**
- judul (string, required)
- deskripsi (string, required)
- tanggal (date, required)
- waktu_mulai (string, required)
- waktu_selesai (string, required)
- lokasi (string, required)
- gambar (file, optional, max 2MB)

### 4. Update Acara (Admin Only)
**PUT/POST** `/api/admin/acara/{id}`

### 5. Delete Acara (Admin Only)
**DELETE** `/api/admin/acara/{id}`

---

## Donation Endpoints

### 1. Create Donation (Public)
**POST** `/api/donations`

**Request Body:**
```json
{
  "donor_name": "John Doe",
  "donor_email": "john@example.com",
  "amount": 100000,
  "donation_type": "Uang",
  "note": "Semoga bermanfaat"
}
```

**Response:**
```json
{
  "success": true,
  "message": "Donation created successfully",
  "data": {
    "donation_id": 1,
    "snap_token": "abc123...",
    "client_key": "SB-Mid-client-..."
  }
}
```

### 2. Get All Donations (Admin Only)
**GET** `/api/admin/donations?per_page=10`

### 3. Get User Donations (User Only)
**GET** `/api/user/donations?per_page=10`

### 4. Delete Donation (Admin Only)
**DELETE** `/api/admin/donations/{id}`

---

## Message (Contact) Endpoints

### 1. Send Message (Public)
**POST** `/api/messages`

**Request Body:**
```json
{
  "nama": "John Doe",
  "telepon": "08123456789",
  "pesan": "Saya ingin bertanya..."
}
```

### 2. Get All Messages (Admin Only)
**GET** `/api/admin/messages?per_page=10`

### 3. Get Single Message (Admin Only)
**GET** `/api/admin/messages/{id}`

### 4. Delete Message (Admin Only)
**DELETE** `/api/admin/messages/{id}`

---

## Settings Endpoints

### 1. Get Settings (Public)
**GET** `/api/settings`

**Response:**
```json
{
  "success": true,
  "data": {
    "logo": "settings/logo.png",
    "favicon": "settings/favicon.ico"
  }
}
```

### 2. Update Logo (Admin Only)
**POST** `/api/admin/settings/logo`
*multipart/form-data with 'logo' file*

### 3. Update Favicon (Admin Only)
**POST** `/api/admin/settings/favicon`
*multipart/form-data with 'favicon' file*

---

## Dashboard Stats (Admin Only)
**GET** `/api/admin/dashboard/stats`

**Response:**
```json
{
  "success": true,
  "data": {
    "total_users": 100,
    "total_berita": 50,
    "total_acara": 20,
    "total_donations": 200,
    "total_messages": 30
  }
}
```

---

## Langkah Selanjutnya

### 1. Start MySQL di Laragon
Jalankan MySQL service di Laragon

### 2. Run Migrations
```bash
php artisan migrate
```

### 3. Testing API dengan Postman/Insomnia
1. Register user baru
2. Login untuk dapat token
3. Gunakan token untuk akses protected endpoints

### 4. Integrasi dengan Flutter

#### Setup Dio (HTTP Client)
```dart
import 'package:dio/dio.dart';

class ApiService {
  final Dio _dio = Dio(
    BaseOptions(
      baseUrl: 'http://your-vps-domain.com/api',
      headers: {
        'Accept': 'application/json',
      },
    ),
  );

  // Set token after login
  void setToken(String token) {
    _dio.options.headers['Authorization'] = 'Bearer $token';
  }

  // Login example
  Future<Map<String, dynamic>> login(String email, String password) async {
    try {
      final response = await _dio.post('/auth/login', data: {
        'email': email,
        'password': password,
      });
      return response.data;
    } catch (e) {
      rethrow;
    }
  }

  // Get berita example
  Future<Map<String, dynamic>> getBerita({int page = 1}) async {
    try {
      final response = await _dio.get('/berita', queryParameters: {
        'per_page': 10,
        'page': page,
      });
      return response.data;
    } catch (e) {
      rethrow;
    }
  }

  // Create donation example
  Future<Map<String, dynamic>> createDonation({
    required String donorName,
    required String donorEmail,
    required int amount,
    String? note,
  }) async {
    try {
      final response = await _dio.post('/donations', data: {
        'donor_name': donorName,
        'donor_email': donorEmail,
        'amount': amount,
        'note': note,
      });
      return response.data;
    } catch (e) {
      rethrow;
    }
  }
}
```

#### Handling Midtrans Payment in Flutter
```dart
// After creating donation, use snap_token with webview_flutter or midtrans_sdk
import 'package:webview_flutter/webview_flutter.dart';

// Open Midtrans payment page
WebView(
  initialUrl: 'https://app.sandbox.midtrans.com/snap/v2/vtweb/${snapToken}',
  javascriptMode: JavascriptMode.unrestricted,
)
```

---

## Notes

1. **Image URLs**: Semua gambar disimpan di `storage/app/public/`. Pastikan sudah run `php artisan storage:link` di server.
   Full URL: `http://your-domain.com/storage/{path}`

2. **CORS**: Sudah dikonfigurasi untuk allow semua origin (`*`). Untuk production, ganti di `config/cors.php`:
   ```php
   'allowed_origins' => ['https://your-flutter-app.com'],
   ```

3. **Rate Limiting**: Laravel default rate limit adalah 60 requests per minute. Bisa diatur di `bootstrap/app.php`.

4. **Error Handling**: Semua response mengikuti format:
   ```json
   {
     "success": true/false,
     "message": "...",
     "data": {}
   }
   ```
