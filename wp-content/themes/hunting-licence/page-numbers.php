<?php 
/*
Template Name: 数字問題
*/
get_header(); ?>
<div class="inner">
        <!-- パンくずパーツ -->
        <?php get_template_part('parts-breadcrumb'); ?>
      </div>
    </div>
    <div class="main-visual numbers">
      <div class="inner">
        <h1><?php the_title(); ?>｜狩猟免許試験過去問集</h1>
        <p>網猟に関する過去問を厳選し、解答と詳細な解説を付けた問題集を提供。試験頻出の知識を効率的に学べるよう構成されています。特に、網猟特有の法規制や使用できる猟具に関する問題を重点的にカバー。スマートフォン対応で、移動時間やスキマ時間を活用しながら知識を定着させることができます。狩猟免許試験の網猟分野で確実に得点できるよう、合格を目指す受験生を徹底サポートします。</p>
      </div>
    </div>
    <div class="inner">
      <h2><?php the_title(); ?></h2>
        <p>狩猟免許試験は、法令関連の問題が
          <strong>全30問中13問</strong>出題されます。言葉が難しかったり紛らわしいものもありますが、法令関連の出来が合否をわけますのでしっかり準備しましょう。今回は
          <strong>網猟</strong>だけに出題される問題を練習します。全猟種共通の問題は
          <a href="laws" target="_blank">こちら</a>で見ることができます。</p>
        <?php get_template_part('parts-infotext'); ?>
        <!-- 問題ここから -->
        <div class="accordion-inner">
          <dl id="accordion">
          <?php
            // カウンター変数を定義（1からスタート）
            $counter = 1;

            // ランダム表示のON/OFFをURLパラメータで制御
            $random = isset($_GET['random']) ? $_GET['random'] : 0;

            // 通常時は「投稿ID順（昇順）」で固定、ランダム時のみシャッフル
            $orderby = ($random == 1) ? 'rand' : 'ID';
            $order = ($random == 1) ? '' : 'ASC'; // 通常時は昇順
            
            // 投稿のループを開始
            $args = array(
                'category_name' => 'numbers', // カテゴリスラッグ「numbers」の記事のみ取得
                'posts_per_page' => -1,   // すべての投稿を表示（ページネーションなし）
                'orderby' => $orderby,    // ランダム or ID順
                'order' => $order

            );
            $the_query = new WP_Query($args);
            ?>

            <!-- ランダム表示切り替えボタン -->
            <?php get_template_part('parts-random-btn'); ?>

            <?php
            if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post();
                    ?>
                    <dt>
                        <span class="question">問<?php echo $counter; ?>：<?php the_title(); ?></span>
                        <!-- <button class="openclose-btn">選択肢を開閉</button> -->
                    </dt>
                    <dd>
                        <span class="answer">答）<?php the_field('answer'); ?><br>
                        <?php the_field('answer_body'); ?></span>
                    </dd>
                    <?php
                    // カウンターを1増やす
                    $counter++;
                endwhile;
                else :
                    echo '<p>投稿が見つかりませんでした。</p>';
                endif;

            // 投稿ループをリセット
            wp_reset_postdata();
            ?>
            </dl>
      </div>

<?php get_footer(); ?>
