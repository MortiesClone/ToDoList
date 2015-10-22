<?php $count = 1;?>
<div id="message" style="display: none;">
    <div class="shadow"></div>
    <div class="window">
        <p></p>
        <input type="button" id="left-btn" class="btn" value="">
        <input type="button" id="right-btn" class="btn" value="Отмена">
    </div>
</div>
<div class="all">
    <input type="text" id="text" class="text">
    <label><input type="checkbox" id="sub-task">sub task</label>
    <?php if($data != null):?>
        <select id="number-of-sub-task">    
        <?php
            foreach($data as $key => $value){
                echo '<option data-id="'.$key.'">'.$count.'</option>';
                $count++;
            }
        ?>    
        </select>
    <?php endif;?>
    <input type="button" class="btn" id="send" value="Готово!">
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