@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')
@section('page-subtitle', 'Ringkasan aktivitas panti asuhan')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="p-6 bg-emerald-100 rounded-lg shadow">
            <h2 class="text-lg font-semibold text-emerald-800">Jumlah Anak Asuh</h2>
            <p class="text-3xl font-bold mt-2">25</p>
        </div>
        <div class="p-6 bg-teal-100 rounded-lg shadow">
            <h2 class="text-lg font-semibold text-teal-800">Total Donasi</h2>
            <p class="text-3xl font-bold mt-2">Rp 18.500.000</p>
        </div>
        <div class="p-6 bg-green-100 rounded-lg shadow">
            <h2 class="text-lg font-semibold text-green-800">Relawan Aktif</h2>
            <p class="text-3xl font-bold mt-2">12</p>
        </div>
    </div>
@endsection