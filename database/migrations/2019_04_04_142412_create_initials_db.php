<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialsDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprise', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('telephone');
            $table->string('contact_email')->nullable();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
        });

        Schema::create('images', function (Blueprint $table) {
           $table->bigIncrements('id');
            $table->string('image');
            $table->string('nom');
            $table->string('store_name');
            $table->string('alt')->nullable();
            $table->string('format');
        });

        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fichier');
            $table->string('nom');
            $table->string('store_name');
            $table->string('format');
        });

        Schema::create('horaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('entreprise_id')->unsigned();
            $table->string('ville');
            $table->string('adresse');
            $table->string('jour')->nullable();
            $table->string('heure_debut')->nullable();
            $table->string('heure_fin')->nullable();

            $table->foreign('entreprise_id', 'entreprise')
                ->references('id')
                ->on('entreprise')
                ->onDelete('cascade');
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->boolean('actif')->default(true);
            $table->bigInteger('icon')->unsigned()->nullable();

            $table->foreign('icon')
                ->references('id')
                ->on('images');
        });

        Schema::create('ingredients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->boolean('actif')->default(true);
            $table->bigInteger('icon')->unsigned()->nullable();

            $table->foreign('icon')
                ->references('id')
                ->on('images');
        });

        Schema::create('produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->bigInteger('categorie_id')->unsigned();
            $table->boolean('actif')->default(true);
            $table->boolean('disponible')->default(true);
            $table->double('prix', 8, 2);
            $table->bigInteger('photo')->unsigned()->nullable();

            $table->foreign('categorie_id', 'categorie')
                ->references('id')
                ->on('categories');

            $table->foreign('photo')
                ->references('id')
                ->on('images');
        });

        Schema::create('produits_ingredients', function (Blueprint $table) {
            $table->bigInteger('produit_id')->unsigned();
            $table->bigInteger('ingredient_id')->unsigned();

            $table->foreign('produit_id', 'produit')
                ->references('id')
                ->on('produits');

            $table->foreign('ingredient_id', 'ingredient')
                ->references('id')
                ->on('ingredients');
        });

        Schema::create('promotions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->boolean('actif')->default(true);
            $table->datetime('date_debut')->nullable();
            $table->datetime('date_fin')->nullable();
            $table->integer('pourcentage_remise')->nullable();
        });

        Schema::create('produits_promotions', function (Blueprint $table) {
            $table->bigInteger('produit_id')->unsigned();
            $table->bigInteger('promotion_id')->unsigned();
            $table->double('nouveau_prix')->nullable();

            $table->foreign('produit_id')
                ->references('id')
                ->on('produits');

            $table->foreign('promotion_id')
                ->references('id')
                ->on('promotions');
        });

        Schema::create('entreprise_documents', function (Blueprint $table) {
            $table->bigInteger('entreprise_id')->unsigned();
            $table->bigInteger('document_id')->unsigned();

            $table->foreign('entreprise_id')
                ->references('id')
                ->on('entreprise');

            $table->foreign('document_id')
                ->references('id')
                ->on('documents');
        });

        Schema::create('entreprise_images', function (Blueprint $table) {
            $table->bigInteger('entreprise_id')->unsigned();
            $table->bigInteger('image_id')->unsigned();

            $table->foreign('entreprise_id')
                ->references('id')
                ->on('entreprise');

            $table->foreign('image_id')
                ->references('id')
                ->on('images');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
        Schema::dropIfExists('documents');
        Schema::dropIfExists('produits_images');
        Schema::dropIfExists('produits_promotions');
        Schema::dropIfExists('promotions');
        Schema::dropIfExists('produits_ingredients');
        Schema::dropIfExists('produits');
        Schema::dropIfExists('ingredients');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('horaires');
        Schema::dropIfExists('entreprise');
    }
}
