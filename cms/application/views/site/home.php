            <article class="boxes">
                
                <h2 class="title">Membership Benefit</h2>   
                
                <img src="<?php echo base_url().'../..'.$membership->media_url; ?>" alt="">    
                
                <?php $end_membership = strpos($membership->sub_content, '<div style="page-break-after:') ?>
                
                <?php if($end_membership): ?>
                    <?php echo substr($membership->sub_content, 0, $end_membership); ?>
                <?php else : ?>
                    <?php echo $membership->sub_content; ?>
                <?php endif; ?>

                <?php echo anchor('membership/page/benefits-of-being-a-member', 'Learn More', 'class="learn-more"'); ?>
            </article>
            <article class="boxes">
                
                <h2 class="title">Latest News</h2>                
                
                <img src="<?php echo base_url().'../..'.$latest_news->media_url; ?>" alt="">             
                
                <p class="bold"><?php echo $latest_news->sub_title; ?></p>
                
                <?php $end_news = strpos($latest_news->sub_content, '<div style="page-break-after:') ?>
                
                <?php if($end_news !== false): ?>
                
                    <?php echo substr($latest_news->sub_content, 0, $end_news); ?>
                
                <?php else :?>
                
                    <?php echo $latest_news->sub_content; ?>
                
                <?php endif; ?>
            </article>
            <article class="boxes last">
                
                <h2 class="title">About ABSG</h2>   
                
                <img src="<?php echo base_url().'../..'.$about->media_url; ?>" alt="">        
                
                <?php $end_about = strpos($about->sub_content, '<div style="page-break-after:')?>
                
                <?php if($end_about !== FALSE): ?>
                
                    <?php echo substr($about->sub_content, 0, $end_about); ?>            
                
                <?php else : ?>
                
                    <?php echo $about->sub_content; ?>            
                
                <?php endif; ?>
            </article>