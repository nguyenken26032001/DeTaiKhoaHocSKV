    <div class="notification">
        <div class="notification__title">
            <a href="">THÔNG BÁO</a>
        </div>
        <div class="notification__lists mw-100">
            <ul>
                <?php
                foreach ($notifications as $item) {
                ?>

                <li class="notification__list--item mw-100">
                    <a class="noti--title"
                        href="<?php echo _WEB_ROOT_; ?>/thong-bao-chi-tiet-<?php echo $item['id'] ?>.html"><?php echo $item['tieuDe'] ?>
                    </a>
                    <div class="notification--time">
                        <ion-icon class="oclock" name="alarm-outline"></ion-icon>
                        <div class="time__date">
                            <p class="time__date--detail">
                                <?php
                                    $time = strtotime($item['ngayDang']);
                                    $day = date('j', $time);
                                    $month = date('m', $time);
                                    $year = date('Y', $time);
                                    echo $day . ' tháng ' . $month . ', ' . $year  ?>
                            </p>
                        </div>
                    </div>
                </li>

                <?php
                }
                ?>
            </ul>
        </div>
    </div>