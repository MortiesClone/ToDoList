<div id="message" style="display: none;">
    <div class="window">
        <p>Сохранить?</p>
        <input type="button" class="btn" value="Сохранить">
        <input type="button" class="btn" value="Не сохронять">
    </div>
    <div class="shadow"></div>
</div>
<div class="all">
    <input type="text" id="text" class="text">
    <input type="button" class="btn" onclick="add_textfield();" value="Добавить подзадачу">
    <input type="button" class="btn" onclick="send();" value="Готово!">
    <div id="inputs"></div>
    <div id="content">
        <?php
            if($data == null)
                echo '<p>список пуст</p>';
            else
                foreach($data as $key => $value){
                    echo '<div class="task" data-id="'.$key.'"><span>'.$value.'</span><span class="glyphicon glyphicon-remove"></span><span class="glyphicon glyphicon-pencil"></span></div>';
                }
        ?>
    </div>
</div>