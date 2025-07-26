<?php 
include("header.php");
?>
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                
                
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                           


                            

                            <form enctype="multipart/form-data" action="purchase.php" class="checkout" method="post" name="checkout">

                                <div id="customer_details" class="col4-set">
                                    <div class="col-6">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Billing Details</h3>
                                       
                                                
                                            </p>

                     <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                    <label class="" for="billing_first_name">Full Name <abbr title="required" class="required"></label>
                     <input type="text" value="" placeholder="" id="billing_first_name" name="fullname" class="input-text ">
                       </p>

                    <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                    <label class="" for="billing_last_name">Email <abbr title="required" class="required"></label>
                     <input type="text" value="" placeholder="" id="billing_last_name" name="email" class="input-text ">
                     </p>
                                            <div class="clear"></div>

                    <p id="billing_company_field" class="form-row form-row-wide">
                    <label class="" for="billing_company">Phone No.</label>
                    <input type="text" value="" placeholder="" id="billing_company" name="phon_no" class="input-text ">
                    </p>

                    <p  class="form-row form-row-wide address-field validate-required">
                    <label class="" for="billing_address_1">Address <abbr title="required" class="required"></label>
                 	<input type="text" value="" id="billing_address_1" name="address" class="input-text"> 
                 	</p>

                                            

                                            

                                            

                                            
                                                <div class="clear"></div>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                           

                                <h3 id="order_review_heading">Your order</h3>

                                <div id="order_review" style="position: relative;">
                                    <table class="shop_table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    Cart Subtotal</td>
                                                <td class="product-total">
                                                    <span class="amount">Rs. <?php echo @$subtotal; ?></span> </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>

                                            <tr class="cart-subtotal">
                                                <th>Tax</th>
                                                <td><span class="amount">Rs. <?php echo  @$tax;?></span>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount">Rs. <?php echo @$subtotal+@$tax;  ?></span></strong> </td>
                                            </tr>

                                        </tfoot>
                                    </table>


                                    <div id="payment">
                                        <ul class="payment_methods methods">
                                            <li class="payment_method_bacs">
                <input type="radio" data-order_button_text="" value="COD" name="payment_cod" class="input-radio" id="payment_method_bacs">
                                                <label for="payment_method_bacs">Cash On Delivery </label>
                                                
                                                </label>
                                                
                                            </li>
                                        </ul>

                                        <div class="form-row place-order">
 <input type="submit" data-value="Place order" value="Place order" id="place_order" name="btn_placeorder" class="button alt">


                                        </div>

                                        <div class="clear"></div>

                                    </div>
                                </div>
                            </form>

                        </div>                       
                    </div>                    
                </div>
            </div>
        </div>
    </div>



<?php include("footer.php"); ?>