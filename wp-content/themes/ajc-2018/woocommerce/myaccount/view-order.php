<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page 
 *
 * @author    WooThemes
 * @package   WooCommerce/Templates
 * @version   2.0.15
 */

echo '<p class="order-info">' . sprintf( __( 'Order <strong class="order-number">%s</strong> was placed on <strong class="order-date">%s</strong> and is currently <strong class="order-status">%s</strong>.', 'woocommerce' ), $order->get_order_number(), date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ), __( $status->name, 'woocommerce' ) ) . '</p>';

$notes = $order->get_customer_order_notes();
if ( $notes ) :
	?>

	<h2><?php _e( 'Order Updates', 'woocommerce' ); ?></h2>
	<ol class="commentlist notes">
		<?php foreach ( $notes as $note ) : ?>
		<li class="comment note">
			<div class="comment_container">
				<div class="comment-text">
					<p class="meta"><?php echo date_i18n( __( 'l jS \o\f F Y, h:ia', 'woocommerce' ), strtotime( $note->comment_date ) ); ?></p>
					<div class="description">
						<?php echo wpautop( wptexturize( $note->comment_content ) ); ?>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
		</li>
		<?php endforeach; ?>
	</ol>
	<?php
endif;

do_action( 'woocommerce_view_order', $order_id ); ?>