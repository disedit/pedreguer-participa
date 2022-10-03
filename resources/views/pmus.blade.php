@extends('layouts.public')

@section('title', 'PMUS Pedreguer')

@php
    $generalSurvey = 'https://docs.google.com/forms/d/e/1FAIpQLSfxMGALbcLF8zuECB1jtkUZ2AkkgOId1j3ThesxCqXW2YoniQ/viewform?usp=sf_link';
    $inbox = 'https://docs.google.com/forms/d/e/1FAIpQLSeNx34INDxb7hbMjunhUqeEjtijHZ5zJBBuLUPJFAGUjrgIyA/viewform?usp=sf_link';
    $eduSurvey = 'https://docs.google.com/forms/d/e/1FAIpQLSfOKh2JUtlgXbNEgkkozdC8JCMvW6cHarmKx8XGFS3tb-rFHw/viewform?usp=sf_link';
@endphp

@section('header')
    @include('components/header')
    <header class="pmus vote-info vote-info--full">
        <div class="container">
            <div class="row">
                <div class="col-md-7 vote-info__text">
                    <h2>PMUS<br>Pedreguer</h2>

                    <p class="vote-info__action d-md-none">
                        <a href="{{ $generalSurvey }}" class="big-button">
                            <i aria-hidden="true" class="fa fa-poll-h"></i> Emplena l'enquesta
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </header>    
@endsection

@section('content')
<div class="row pmus">
    <div class="col-lg-8">
        <p>Mitjançant aquesta web, vosté podrà conéixer tots els detalls del projecte d'elaboració del <strong>PMUS de la població de Pedreguer</strong>.</p>
        <p>Un <strong>Pla de Mobilitat Urbana Sostenible</strong> (PMUS) és un conjunt d'actuacions que tenen com a objectiu la potenciació de les formes de desplaçament més sostenibles <strong>(caminar, bicicleta i transport públic)</strong> dins d'una aglomeració urbana; és a dir, d’aquells modes de transport que compatibilitzen amb el creixement econòmic, cohesió social i defensa del medi ambient, garantint, d'aquesta manera, una millor qualitat de vida per als ciutadans. </p>
        <p>A més podrà col·laborar en el projecte realitzant l'<a href="{{ $generalSurvey }}" target="_blank">enquesta en línia</a>. Els seus suggeriments són molt importants per a nosaltres atés que ens ajuden a conéixer l'opinió de les persones i així poder millorar, així que no dubte a utilitzar la <a href="" target="_blank">bústia de suggeriments</a>.</p>
        <p>El punt de sortida de la <strong>Mobilitat Sostenible</strong> es centra en conèixer el grau de sostenibilitat dels diferents modes de transport disponibles per a cobrir la actual demanda de desplaçaments i donar solucions a la distribució urbana de mercaderies.</p>
        <p>Les bases d’una mobilitat més sostenible es constitueixen en la recerca de soluciones per a reduir l’ús dels recursos naturals no renovables i que provoquen menys patiments al medi ambient.</p>
        
        <div class="buttons d-lg-none">
            <a href="{{ $generalSurvey }}" class="huge-button main">
                <i class="far fa-poll-h"></i>
                Emplena l'enquesta
            </a>
            <a href="{{ $inbox }}" class="huge-button inbox">
                <i class="far fa-mailbox"></i>
                Bústia de suggeriments
            </a>
            <a href="{{ $eduSurvey }}" class="huge-button schools">
                <i class="far fa-chalkboard-teacher"></i>
                Enquesta centres educatius
            </a>
        </div>

        <h3>Notícies</h3>
        <p class="no-news">Encara no hi ha cap notícia</p>
        <h3>Documents</h3>
        <ul class="docs">
            <li><a href="/docs/pmus/enquesta-pedreguer-val.pdf"><i class="far fa-file-alt fa-fw"></i> Enquesta General <span>PDF</span></a></li>
            <li><a href="/docs/pmus/enquesta-centre-educatiu-val.pdf"><i class="far fa-file-alt fa-fw"></i> Enquesta Centres Educatius <span>PDF</span></a></li>
            <li><a href="/docs/pmus/mapa-zonificacio.pdf"><i class="far fa-map fa-fw"></i> Pla de zonificació <span>PDF</span></a></li>
        </ul>
    </div>
    <div class="col-lg-4 d-none d-lg-block">
        <div class="buttons buttons-sticky">
            <a href="{{ $generalSurvey }}" class="huge-button main">
                <i class="far fa-poll-h"></i>
                Emplena l'enquesta
            </a>
            <a href="{{ $inbox }}" class="huge-button inbox">
                <i class="far fa-mailbox"></i>
                Bústia de suggeriments
            </a>
            <a href="{{ $eduSurvey }}" class="huge-button schools">
                <i class="far fa-chalkboard-teacher"></i>
                Enquesta centres educatius
            </a>
        </div>
    </div>
</div>
@endsection
