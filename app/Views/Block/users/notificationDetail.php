        <div id="demo articleDetail" class="prevInformation__wrapper">
            <p class="notification__title--detail">
                <?php echo $notificationDetail[0]['tieuDe'] ?>
            </p>
            <p class="notification_content--detail">
                <?php echo $notificationDetail[0]['noiDung'] ?>
            </p>
            <div class="dowload--document d-flex mb-5">
                <ion-icon name="download-outline" class="icon-download"></ion-icon>
                <a href="<?php echo _WEB_ROOT_ ?>/Uploads/FileNotification/<?php echo  $notificationDetail[0]['fileDinhKem'] ?>"> DownLoad file đính kèm tại đây</a>
            </div>
        </div>