<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-dialog_top">
        <div class="modal-content ctt">
            <div class="modal-header"><button class="close" type="button" data-dismiss="modal">×</button>
                <h4 class="modal-title">Заказать звонок</h4>
            </div>

            <form action="{{ route('quick_call') }}" method="post" id="contact-form-top" name="quick_call">
                <input type="text" name="name" placeholder="ФИО" required>
                <input type="text" name="tel" placeholder="Телефон" required>
                <input type="text" name="email" placeholder="Email" required>
                <button type="submit">Отправить</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>