<div class="data_print" id="print_order">
    <table>
        <thead>
        <tr>
            <th>Название</th>
            <th>Кол-во</th>
            <th>Цена</th>
            <th>Всего</th>
        </tr>
        </thead>

        <tbody>

        <?php use Gloudemans\Shoppingcart\Facades\Cart;?>
        <?php foreach(Cart::content() as $row) :?>

        <tr>
            <td>
                <p><strong><?php echo $row->name; ?></strong></p>
                <p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
            </td>
            <td><?php echo $row->qty; ?></td>
            <td><?php echo $row->price; ?> грн.</td>
            <td><?php echo $row->total; ?> грн.</td>
        </tr>

        <?php endforeach;?>

        </tbody>

        <tfoot>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td>Вся сумма</td>
            <td><?php echo Cart::subtotal(); ?></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td>Скидка</td>
            <td><?php echo Cart::tax(); ?></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td>Итог</td>
            <td><?php echo Cart::total(); ?></td>
        </tr>
        </tfoot>
    </table>
</div>