<?php

function entrepriseIsDefine() {
    return \App\Models\Entreprise::all()->count() !== 0;
}