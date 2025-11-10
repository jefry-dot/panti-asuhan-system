@extends('layouts.user')

@section('title', 'Dashboard Donatur')
@section('page-title', 'Dashboard Donatur')
@section('page-subtitle', 'Ringkasan donasi dan anak yang Anda bantu')

@section('content')
    <div class="bg-white shadow rounded-xl p-6 border border-emerald-100">
        <h2 class="text-lg font-semibold text-emerald-800 mb-4">Statistik Donasi</h2>
        <p class="text-gray-600">Selamat datang kembali, {{ Auth::user()->name ?? 'Donatur' }}!</p>
        <p class="text-gray-500 mt-2">Terima kasih telah menjadi bagian dari kebaikan hari ini 🌿</p>
    </div>
@endsection