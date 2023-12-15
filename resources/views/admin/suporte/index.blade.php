@extends('admin.layouts.app')

@section('title', 'Fórum')

@section('header')
@include('admin.suporte.partials.header', compact('suportes'))
@endsection

@section('content')
@include('admin.suporte.partials.content')

<x-pagination
    :paginator="$suportes"
    :appends="$filters" />

@endsection