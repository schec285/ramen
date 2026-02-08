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
        Schema::create('prefectures', function (Blueprint $table) {
            $table->id();
            $table->string('prefecutre_name', 10)->unique()->comment('都道府県名');
            $table->enum('region', ['北海道', '東北', '関東', '中部', '関西', '中国', '四国', '九州', '沖縄'])->comment('地域');
        });

        Schema::create('blogs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->string('store_name')->comment('店舗名');
            $table->string('ramen-name')->comment('ラーメン名');
            $table->integer('price')->comment('価格');
            $table->string('postal_code', 7)->comment('郵便番号');
            $table->string('prefecture', 10)->comment('都道府県');
            $table->string('city', 50)->comment('市区町村');
            $table->string('address')->comment('住所');
            $table->decimal('latitude', 10, 7)->nullable()->comment('GoogleMaps-緯度');
            $table->decimal('longitude', 10, 7)->nullable()->comment('GoogleMaps-軽度');
            $table->string('thumbnail_image_path')->comment('サムネイル画像パス');
            $table->integer('score')->default(0)->comment('点数');
            $table->longText('body')->nullable()->comment('本文(markdown)');
            $table->timestamps();
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('tags_name')->unique()->comment('タグ名');
        });

        Schema::create('blog_tag', function (Blueprint $table) {
            $table->foreignUuid('blog_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('tag_id')->constrained()->onDelete('cascade');
            $table->primary(['blog_id', 'tag_id']);
        });

        // テーブルコメントの追加
        Schema::table('prefectures', function (Blueprint $table) {
            $table->comment('都道府県');
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
        Schema::dropIfExists('blogs');
    }
};
