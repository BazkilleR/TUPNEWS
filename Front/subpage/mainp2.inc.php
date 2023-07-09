<main>
  <section class="section">
    <div class="container mt-5">
      <!-- <div class="main-news">
        <h1 class="line">ข่าวล่าสุด</h1>
      </div> -->
      <div class="row no-gutters-lg ">
        <div class="col-xl-8 mb-5 mb-lg-0">
          <!-- <div class="mt-3">
            <h1 class="line2">ข่าวสารล่าสุด</h1>
          </div> -->
          <div class="row">
            <?php
            // connect db
            require 'server.php';

            // select data
            $sql = "SELECT * from news ORDER BY UploadDate DESC LIMIT 5";
            $result = $mysqli->query($sql);

            if ($result) {
              $count = 0;
              while ($dbarr = $result->fetch_assoc()) {
                $id = $dbarr['id'];
                $topic = $dbarr['topic'];

                $content = $dbarr['content'];
                $formattedContent = nl2br($content);

                $UploadDate = $dbarr['UploadDate'];
                // format jesusYear ti buddhishYear
                $buddhistYear = intval(date('Y', strtotime($UploadDate))) + 543;
                $buddhistDate = date('d-m-', strtotime($UploadDate)) . $buddhistYear;

                $category = $dbarr['category'];
                $img = $dbarr['img'];

                if ($count == 0) { ?>
                  <!-- main news -->
                  <div class="col-12 mb-4 ">
                    <article class="card article-card border-0">
                      <a href="article.html">
                        <div class="card-image">
                          <div class="post-info">
                            <span class="text-uppercase"><?= $buddhistDate ?></span>
                          </div>
                          <img loading="lazy" decoding="async" src="<?= $img ?>" alt="Post Thumbnail" class="w-100">
                        </div>
                      </a>
                      <div class="card-body px-0 pb-1">
                        <ul class="post-meta mb-2">
                          <li>
                            <a class="second" id="second" style="position: relative; z-index: 2;" href="<?php echo $category ?>_news.php"><?= $category ?></a>
                          </li>
                        </ul>
                        <h2>
                          <a class="post-title stretched-link" href="show_detail.php?id=<?php echo $id ?>"><?= $topic ?></a>
                        </h2>
                        <!-- <p class="card-text" id="descr-content"><?= $formattedContent ?></p> -->
                      </div>
                    </article>
                  </div>
                <?php
                } else { ?>
                  <!-- news -->
                  <div class="col-md-6 mb-4">
                    <article class="card article-card article-card-sm h-100 border-0">
                      <a href="article.html">
                        <div class="card-image">
                          <div class="post-info">
                            <span class="text-uppercase"><?= $buddhistDate ?></span>
                          </div>
                          <img loading="lazy" decoding="async" src="<?= $img ?>" alt="Post Thumbnail" class="w-100">
                        </div>
                      </a>
                      <div class="card-body px-0 pb-0">
                        <ul class="post-meta mb-2">
                          <li>
                            <a style="position: relative; z-index: 2;" href="<?php echo $category ?>_news.php"><?= $category ?></a>
                          </li>
                        </ul>
                        <h2>
                          <a class="post-title stretched-link" href="show_detail.php?id=<?php echo $id ?>"><?= $topic ?></a>
                        </h2>
                        <!-- <p class="card-text" id="descr-content"><?= $formattedContent ?></p> -->
                      </div>
                    </article>
                  </div>
            <?php
                }
                ++$count;
              } // end loop
            }
            ?>
            <!-- nav -->
            <div class="col-12">
              <div class="row">
                <div class="col-12">
                  <nav class="mt-4">
                    <nav class="mb-md-50">
                    </nav>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- left column -->
        <div class="col-lg-4 rwidget mb-3">
          <div class="widget-blocks">
            <div class="row">
              <div class="col-lg-12 col-md-6 rwcard">
                <div class="widget">
                  <!-- button -->
                  <!-- <div class="d-grid gap-2 widget-head ">
                    <a href="http://43.229.77.153/~ztrad/tup_conn34/" class="btn wbtn rounded-0 btn-lg " role="button" type="button">รายงานผลการเรียน
                    </a>
                    <a href="palace.php" class="btn wbtn rounded-0 btn-lg wbtn" role="button" type="button">ทำเนียบคณะกรรมการ ม.6
                    </a>
                  </div> -->
                  <!-- button -->
                  <div class="mt-3">
                    <h1 class="line2">ข่าวสารสำคัญ</h1>
                  </div>
                  <div class="widget-body">
                    <div class="widget-list">
                      <?php
                      // select data
                      $sql = "SELECT * from news ORDER BY UploadDate DESC LIMIT 5";
                      $result = $mysqli->query($sql);

                      if ($result) {
                        $count = 0;
                        while ($dbarr = $result->fetch_assoc()) {
                          $id = $dbarr['id'];
                          $topic = $dbarr['topic'];
                          $content = $dbarr['content'];

                          $content = $dbarr['content'];
                          $formattedContent = nl2br($content);

                          $UploadDate = $dbarr['UploadDate'];
                          // format jesusYear ti buddhishYear
                          $buddhistYear = intval(date('Y', strtotime($UploadDate))) + 543;
                          $buddhistDate = date('d-m-', strtotime($UploadDate)) . $buddhistYear;

                          $category = $dbarr['category'];
                          $img = $dbarr['img'];

                          if ($count == 0) { ?>
                            <!-- big news -->
                            <article class="card mb-4 round-0 border-0">
                              <div class="card-image">
                                <div class="post-info">
                                  <span class="text-uppercase"><?= $buddhistDate ?></span>
                                </div>
                                <img loading="lazy" decoding="async" src="<?= $img ?>" alt="Post Thumbnail" class="w-100">
                              </div>
                              <div class="card-body p-3">
                                <h3>
                                  <a class="post-title post-title-sm stretched-link" href="show_detail.php?id=<?php echo $id ?>"><?= $topic ?></a>
                                </h3>
                                <!-- <p class="card-text" id="descr-content"><?= $formattedContent ?></p> -->
                              </div>
                            </article>
                          <?php
                          } else { ?>
                            <div class="card h-100 mb-3 round-0 border-0 ">
                              <div class="row g-0">
                                <div class="col-md-4">
                                  <img src="<?= $img ?>" style="height: 100%; width: 100%; object-fit: cover;">
                                </div>
                                <div class="col-md-8">
                                  <div class="card-body">
                                    <div>
                                      <h5 class="card-title">
                                        <a class="post-title post-title-sm stretched-link" style="font-size: 1.1rem;" id="sub-topic" href="show_detail.php?id=<?php echo $id ?>"><?= $topic ?></a>
                                      </h5>
                                    </div>
                                    <!-- <div>
                                      <p class="post-title post-title-sm" id="sub-topic"><?= $formattedContent ?></p>
                                    </div> -->
                                    <div>
                                      <a class="second" id="second" style="position: relative; z-index: 2; text-decoration: none; color: #FFB6C1;" href="<?php echo $category ?>_news.php"><?= $category ?></a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                      <?php
                          }
                          ++$count;
                        } // end loop
                      }
                      $mysqli->close();
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>