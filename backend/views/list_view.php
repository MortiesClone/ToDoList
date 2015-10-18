<input type="text" name="text" class="text">
<input type="button" class="btn" onclick="add_textfield();" value="Добавить подзадачу">
<input type="button" class="btn" onclick="send();" value="Готово!">
<div id="inputs"></div>
<div id="content">
    <?php
        if($data == null)
            echo '<p>список пуст</p>';
        else
            foreach($data as $value){
                echo '<p>'.$value.'<input type="checkbox"></p>';
            }
    ?>
</div>