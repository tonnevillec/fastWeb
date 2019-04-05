@extends('layouts.back')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="list-group">
                    <a href="{{ route('admin') }}"
                       class="list-group-item list-group-item-action @if(!isset($entity)) list-group-item-dark @endif">
                        <i class="fa fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a href="{{ route('entreprise.index') }}"
                       class="list-group-item list-group-item-action @if(isset($entity) && $entity === 'entreprise') list-group-item-dark @endif">
                        <i class="far fa-arrow-alt-circle-right"></i> Entreprise
                    </a>
                    @if (entrepriseIsDefine())
                        <a href="{{ route('horaires.index') }}"
                           class="list-group-item list-group-item-action @if(isset($entity) && $entity === 'horaires') list-group-item-dark @endif">
                            <i class="far fa-arrow-alt-circle-right"></i> Horaires
                        </a>
                        <a href="#"
                           class="list-group-item list-group-item-action @if(isset($entity) && $entity === 'categories') list-group-item-dark @endif">
                            <i class="far fa-arrow-alt-circle-right"></i> Catégories
                        </a>
                        <a href="#"
                           class="list-group-item list-group-item-action @if(isset($entity) && $entity === 'ingredients') list-group-item-dark @endif">
                            <i class="far fa-arrow-alt-circle-right"></i> Ingrédients
                        </a>
                        <a href="#"
                           class="list-group-item list-group-item-action @if(isset($entity) && $entity === 'produits') list-group-item-dark @endif">
                            <i class="far fa-arrow-alt-circle-right"></i> Produits
                        </a>
                        <a href="#"
                           class="list-group-item list-group-item-action @if(isset($entity) && $entity === 'promotions') list-group-item-dark @endif">
                            <i class="far fa-arrow-alt-circle-right"></i> Promotions
                        </a>
                        <a href="#"
                           class="list-group-item list-group-item-action @if(isset($entity) && $entity === 'documents') list-group-item-dark @endif">
                            <i class="far fa-arrow-alt-circle-right"></i> Documents
                        </a>
                    @endif
                </div>

                <div class="list-group mt-2">
                    <div class="list-group-item bg-danger"><i class="fa fa-cogs"></i> Administration</div>
                    <a href="#"
                       class="list-group-item list-group-item-action @if(isset($entity) && $entity === 'users') list-group-item-dark @endif">
                        <i class="fa fa-users-cog"></i> Utilisateurs
                    </a>
                </div>
            </div>

            <div class="col-9">
                <div class="card">
                    @yield('body')
                </div>
            </div>
        </div>
    </div>
@endsection
