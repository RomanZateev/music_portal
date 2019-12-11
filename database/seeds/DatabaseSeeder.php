<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Roman',
            'email' => 'roma-zateev@mail.ru',
            'password' => bcrypt('12345678'),
            'type' => 'admin'
        ]);

        DB::table('artists')->insert([
            'name' => 'ЛСП',
            'nameURL' => 'lsp',
            'biograpy' => 
            'Оле́г Вади́мович Са́вченко (белор. Але́г Вадзі́мавіч Са́ўчанка; род. 10 июля 1989, Витебск), более известный под сценическим псевдонимом ЛСП (сокращение от англ. Lil’ Stupid Pig) — белорусский певец, рэпер и автор песен из Минска. Сольную карьеру начал в 2007 году, с тех пор выпустив три мини-альбома и четыре студийных альбома. Тесно сотрудничал с могилёвским продюсером Романом Сащеко (он же Рома Англичанин; 27 апреля 1988 — 30 июля 2017) как одноимённый дуэт «ЛСП».'
        ]);

        DB::table('artists')->insert([
            'name' => 'Oxxxymiron',
            'nameURL' => 'oxxxymiron',
            'biograpy' => 
            'Oxxxymiron (Оксимиро́н; настоящее имя — Миро́н Я́нович Фёдоров; род. 31 января 1985 года, Ленинград, РСФСР, СССР) — российский хип-хоп-исполнитель и бывший исполнительный директор букинг-агентства Booking Machine. Один из основателей и бывший участник лейбла Vagabund.'
        ]);

        DB::table('songs')->insert([
            'name' => 'Безумие',
            'nameURL' => 'bezumie',

            'text' => 
            '[Припев: ЛСП]
            Я, честно, даже не помню, что в моём бланте
            «Бомбей», «Туссин», «Бакарди» — даже не знаю, что в моём «Спрайте»
            Эта сука тоже не знает, что в её «Спрайте»
            Она кричит: «Хватит!», но мне не хватит
            Я срываю с неё платье
            И мы оба впадаем в безумие, безумие
            Мы оба впадаем в безумие, безумие
            Мы часто впадаем в безумие, безумие
            Оба впадаем в безумие, е, е, е, е-е

            [Интро: ЛСП]
            Безумие-е-е
            Я, честно, даже не знаю, что в моём бланте
            Что в моём… что в моём… что в моём «Спрайте» (эй)',

            'textAuthor' => 'ЛСП',
            'musicAuthor' => 'ЛСП',
            'album' => 'Magic City',
            'video' => 'https://www.youtube.com/embed/GRvRIS--JRo',

            'notes' => '
            Еще одна версия песни ЛСП "Безумие", теперь, с участием Oxxxymiron.
            Блант – это ароматизированный лист табака предназначенный для скручивания joint’s (самокруток). Табак особым образом обрабатывается, гомогенизируется, ароматизируется и впоследствии из него получаются бланты, из которых так приятно и легко крутить самокрутки.
            ',
        ]);

        DB::table('artist_song')->insert([
            'artist_id' => '1',
            'song_id' => '1'
        ]);

        DB::table('artist_song')->insert([
            'artist_id' => '2',
            'song_id' => '1'
        ]);

        DB::table('songs')->insert([
            'name' => 'Мне скучно жить',
            'nameURL' => 'mne-skuchno-jit',

            'text' => 
            '[Куплет 1: ЛСП]
            Моя милая девочка Саша — сердцеедка со стажем
            Как и я, прямо скажем, но мы ничего прямо друг другу не скажем (нет)
            Чтобы не портить наш красивый рассказ, я буду слепой статуей
            От меня и не надо ей глаз — не надоесть быть моей надо ей
            Но какими бы полными не были наши сосуды
            Рано или поздно, мы выпьем до дна друг друга
            А в высохших лужах не видно звёзды
            И уйти, не хлопая дверью, — всё, что ты мне готова предложить
            А я уже думал, что с тобой мне может быть не скучно жить

            [Припев: ЛСП]
            Люди бегут туда-сюда — только пятки сверкают
            Эти люди всегда, что делать, знают
            А мне скучно жить, скучно жить, скучно
            Мне нечего делать и поэтому скучно жить, скучно жить, скучно
            Жить…',

            'textAuthor' => 'ЛСП',
            'musicAuthor' => 'ЛСП'
        ]);

        DB::table('artist_song')->insert([
            'artist_id' => '1',
            'song_id' => '2'
        ]);

        DB::table('artist_song')->insert([
            'artist_id' => '2',
            'song_id' => '2'
        ]);
    }
}
