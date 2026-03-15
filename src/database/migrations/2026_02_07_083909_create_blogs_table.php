<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained()->cascadeOnDelete();
            $table->string('store_name', 50)->comment('店舗名');
            $table->string('ramen_name', 50)->comment('ラーメン名');
            $table->integer('price')->comment('価格');
            $table->decimal('latitude', 10, 7)->comment('GoogleMaps-緯度');
            $table->decimal('longitude', 10, 7)->comment('GoogleMaps-経度');
            $table->string('place_id', 255)->nullable()->comment('GoogleMaps-PlaceID');
            $table->string('country_iso', 2)->nullable()->comment('ISO国コード');
            $table->string('postal_code', 7)->nullable()->comment('郵便番号');
            $table->string('prefecture', 100)->nullable()->comment('都道府県');
            $table->string('city', 50)->nullable()->comment('市区町村');
            $table->string('formatted_address', 255)->nullable()->comment('GoogleMaps-フォーマット住所');
            $table->string('address', 255)->nullable()->comment('住所');
            $table->string('thumbnail_image_path')->nullable()->comment('サムネイル画像パス');
            $table->integer('score')->default(0)->comment('点数');
            $table->longText('body')->nullable()->comment('本文(markdown)');
            $table->timestamps();
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->unique()->comment('タグ名');
        });

        Schema::create('blog_tag', function (Blueprint $table) {
            $table->foreignUuid('blog_id')->constrained()->cascadeOnDelete();
            $table->foreignUuid('tag_id')->constrained()->cascadeOnDelete();
            $table->primary(['blog_id', 'tag_id']);
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->comment('ブログ');
        });

        Schema::table('tags', function (Blueprint $table) {
            $table->comment('タグ');
        });

        Schema::table('blog_tag', function (Blueprint $table) {
            $table->comment('ブログ-タグ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_tag');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('blogs');
    }
};
