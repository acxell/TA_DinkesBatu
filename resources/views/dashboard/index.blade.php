@extends('layout.index')
@section('title', 'dashboard')
@section('content')

<div class="container-fluid overflow-auto">
    <div class="row g-3 align-items-stretch">
        <div class="col-md-4 col-sm-6 col-12">
            <x-card class="h-100">
                <x-slot name="icon">
                    <i class="bi bi-people-fill text-white fs-4"></i>
                </x-slot>
                <h5 class="card-title text-muted">Jumlah Anak</h5>
                <p class="card-text">20</p>
            </x-card>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <x-card class="h-100">
                <x-slot name="icon">
                    <i class="bi bi-calendar-week-fill text-white fs-4"></i>
                </x-slot>
                <h5 class="card-title text-muted">Terakhir Periksa</h5>
                <p class="card-text">17/03/2025</p>
            </x-card>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <x-card class="h-100">
                <x-slot name="icon">
                    <i class="bi bi-hospital-fill text-white fs-4"></i>
                </x-slot>
                <h5 class="card-title text-muted">Tempat Pemeriksaan</h5>
                <p class="card-text">Puskesmas Singosari</p>
            </x-card>
        </div>
    </div>
</div>


@endsection
