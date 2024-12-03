<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Landing_site
 */

?>

<footer id="colophon" class="s-footer">
	<div class="row s-footer__subscribe">
		<div class="column lg-12">
			<h2>
				Subscribe to our news letter:
			</h2>
			<p>
				Subscribe now to get all updates
			</p>
			<form id="mc-form" class="mc-form">
                <input type="email" name="EMAIL" id="mce-EMAIL" class="u-fullwidth text-center" placeholder="Your Email Address" title="The domain portion of the email address is invalid (the portion after the @)." pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" required>
                <input type="submit" name="subscribe" value="Subscribe" class="btn--small btn--primary u-fullwidth">
                <div class="mc-status"></div>
            </form>
		</div>
	</div>
	<div class="row s-footer__main">
		<div class="column lg-5 md-6 tab-12 s-footer__about">
			<?php if(is_active_sidebar('footer-1')):?>
				<?php dynamic_sidebar('footer-1');?>
			<?php endif;?>
			
		</div>
		<div class="column lg-5 md-6 tab-12">
			<div class="row">
				<div class="column lg-6">
					<?php if(is_active_sidebar('footer-2')):?>
						<?php dynamic_sidebar('footer-2');?>
					<?php endif;?>
				</div>
				<div class="column lg-6">
					<?php if(is_active_sidebar('footer-3')):?>
						<?php dynamic_sidebar('footer-3');?>
					<?php endif;?>
				</div>
			</div>
		</div>
		
		
	</div>	
	<div class="row s-footer__bottom">

                <div class="column lg-7 md-6 tab-12">
                    <ul class="s-footer__social">
                        <li>
							<a href="https://facebook.com" target="_blank" aria-label="Facebook">
								<i class="fab fa-facebook-f"></i>
							</a>
                        </li>
                        <li>
							<a href="https://twitter.com" target="_blank" aria-label="Twitter">
								<i class="fab fa-twitter"></i>
							</a>
                        </li>
                        <li>
							<a href="https://instagram.com" target="_blank" aria-label="Instagram">
								<i class="fab fa-instagram"></i>
							</a>
                        </li>
                        <li>
							<a href="https://pinterest.com" target="_blank" aria-label="Pinterest">
								<i class="fab fa-pinterest"></i>
							</a>
                        </li>
                    </ul>
                </div>
                <div class="column lg-5 md-6 tab-12">
                    <div class="ss-copyright">
                        <span>© Copyright Spurgeon 2021</span> 
                        
                    </div>
                </div>

            </div> <!-- end s-footer__bottom -->
</footer>
<?php wp_footer(); ?>

</body>
</html>
