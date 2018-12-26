    <div class="sherif_row">
                  <div class="modal fade" id="Basket" role="dialog">
                        <div class="modal-dialog sherif-basket">
                          <!-- Modal content-->
                            <div class="modal-content sherif-basket_content">
                                <div class="modal-header sherif-basket_content_header">
                                    <h4 class="sherif-basket_content_header_title">Корзина</h4>
                                </div>
                                <div class="modal-body sherif-basket_content_body">
                                    <?php if(count($products) == 0): ?>
                                        <h3 class="basket_status">Корзина Пуста</h3>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="sherif-basket_content_body_itm bsk_itm_<?php echo e($product->id); ?>">
                                                <div class="sherif-basket_product">
                                                    <img src="<?php echo e(asset('storage/'. $product->mainimage)); ?>" class="sherif-basket_product_img" alt="">
                                                    <div class="sherif-basket_product_description">
                                                        <span class="sherif-basket_product_description_title">
                                                            <a href="<?php echo e(route('productNoURL', ['id'=>$product->id])); ?>" class="sherif-basket_product_description_link">
                                                                <?php echo e($product->name); ?>

                                                            </a>
                                                            <br/>
                                                            <span class="sherif-basket_product_description_code">Артикул: <span><?php echo e($product->vendor_code); ?></span> </span>
                                                            <span class="sherif-basket_product_description_code">Код товара: <span><?php echo e($product->code); ?></span></span>
                                                        </span>
                                                        <span class="sherif-basket_product_description_sc">
                                                            <span>Размер: <span class="sherif-basket_product_description_sc_size">L</span></span>
                                                            <span>Цвет: <span class="sherif-basket_product_description_sc_color">олива</span></span>
                                                        </span>
                                                        <span class="sherif-basket_product_description_price">
                                                            <span  class="sherif-basket_product_description_price_prev">Цена: <span>970</span> грн</span>
                                                            <span  class="sherif-basket_product_description_price_current">Цена: <span> <?php echo e($product->price_final); ?></span> грн</span>
                                                        </span>
                                                        <a class="sherif-basket_product_description_link delete_from_basket" id_product="<?php echo e($product->id); ?>"><i class="fas fa-times"></i> Убрать из корзины</a>
                                                    </div>
                                                </div>
                                                        <div class="sherif-basket_price">
                                                            <div class="sherif-basket_quantity">
                                                                <a togglers="down" class="sherif-basket_quantity_min product_togglers" id_product="<?php echo e($product->id); ?>">-</a>
                                                                <input type="text" id="basket_product_amount_<?php echo e($product->id); ?>" class="product_amount_input sherif-basket_quantity_num" value="<?php echo e($product->amount); ?>" id_product="<?php echo e($product->id); ?>">
                                                                <a togglers="up" class="sherif-basket_quantity_plus product_togglers" id_product="<?php echo e($product->id); ?>">+</a></div>
                                                                <span class="sherif-basket_sum sum_basket_ + element.id + ">Сумма <span><?php echo e($product->price_final * $product->amount); ?></span> грн</span>
                                                         </div>
                                                </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                                <?php if(count($products) == 0): ?>
                                    <div class="modal-footer sherif-basket_content_footer">
                                        <span class="sherif-basket_content_footer_total">Общая сумма: <span class="total_basket">0</span> грн.</span>
                                        <div class="sherif-basket_content_footer_btns">
                                            <a class="sherif-basket_content_footer_btns_btn" data-dismiss="modal">ПРОДОЛЖИТЬ ПОКУПКИ</a>
                                             <a href="<?php echo e(route('ordering')); ?>" class="sherif-basket_content_footer_btns_btn order_btn">ОФОРМИТЬ ЗАКАЗ</a>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="modal-footer sherif-basket_content_footer">
                                        <span class="sherif-basket_content_footer_total">Общая сумма: <span class="total_basket"><?php echo e($curr_price); ?></span> грн.</span>
                                        <div class="sherif-basket_content_footer_btns">
                                            <a class="sherif-basket_content_footer_btns_btn" data-dismiss="modal">ПРОДОЛЖИТЬ ПОКУПКИ</a>
                                            <a href="<?php echo e(route('ordering')); ?>" class="sherif-basket_content_footer_btns_btn order_btn">ОФОРМИТЬ ЗАКАЗ</a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                            </div>
                        </div>
                  </div> 
              </div>
