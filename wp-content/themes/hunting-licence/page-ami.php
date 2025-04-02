<?php 
/*
Template Name: あみ
*/
get_header(); ?>
<div class="inner">
        <nav class="breadcrumb">
          <ul>
            <li>
              <a href="index.html">狩猟免許過去問</a>
            </li>
            <li>
              <a>網猟 過去問</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="main-visual ami">
      <div class="inner">
        <h1>網猟のみ｜狩猟免許試験過去問集</h1>
        <p>狩猟免許試験の過去問題を猟具ごとに整理し、全ての問題に答えと詳しい解説を網羅しています。また、スマートフォン対応により、移動中やテスト直前でも手軽に復習できる設計となっており、効率的な暗記や知識の定着に役立ちます。これにより、狩猟免許試験の準備をいつでもどこでも進めることができ、受験者が合格に向けた学習を効率的に行えるようサポートしています。</p>
      </div>
    </div>
    <div class="inner">
      <h2>練習問題</h2>
        <p>狩猟免許試験は、法令関連の問題が
          <strong>全30問中13問</strong>出題されます。言葉が難しかったり紛らわしいものもありますが、法令関連の出来が合否をわけますのでしっかり準備しましょう。今回は
          <strong>網猟</strong>だけに出題される問題を練習します。全猟種共通の問題は
          <a href="hourei.html" target="_blank">こちら</a>で見ることができます。</p>
        <p>2024年の例題集から抜粋していますので、法律が改訂されたりして答えが違う場合はご指摘いただけると幸いです。</p>
        <p class="annotation">※問題文をクリックすると選択肢・解答が表示されます。</p>
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
                'category_name' => 'net', // カテゴリスラッグ「net」の記事のみ取得
                //'post_type' => 'post', // カテゴリスラッグ「net」の記事のみ取得
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
                        <dl>
                            <dt class="select-dt">
                                <ul>
                                    <li>ア：<?php the_field('select_a'); ?></li>
                                    <li>イ：<?php the_field('select_i'); ?></li>
                                    <li>ウ：<?php the_field('select_u'); ?></li>
                                </ul>
                                <button class="answer-btn">答えを開閉</button>
                            </dt>
                            <dd class="answer-dd">
                                <span class="answer">答）<?php the_field('answer'); ?><br>
                                <?php the_field('answer_body'); ?></span>
                            </dd>
                        </dl>
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
