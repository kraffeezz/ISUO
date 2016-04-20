
<form name="form1" action="index.php" method="get" >
<div >
<input type="hidden" name="work_this" value="6"/>
<input type="hidden" name="kp" value="1"  id = "count"/>
<table border="3">

<tr>
<td>
<label for="p1">
   Прізвище:
 </label>
 <input type="text" name="p1"/>
 <p>
 <label for="p2">
   Ім'я:
 </label>
 <input type="text" name="p2"/>
  <p>
 <label for="p3">
   По батькові:
 </label>
 <input type="text" name="p3"/>
  <p>
 <label for="p4">
   Стать:
 </label>
 <select name="p4">
 <option value="chol">Чоловіча</option>
 <option value="jin">Жіноча</option>
 </select>
 <p>
 <label for="p5">
   Адреса:
 </label>
<textarea name="p5" rows="5" cols="30"></textarea>
 <p>
 <label for="p6">
   Телефон 1:
 </label>
 <input type="text" class="phone1"  placeholder="Введите ваш телефон" name="p6"/>
  <p>
 <label for="p7">
   Телефон 2:
 </label>
 <input type="text" class="phone1"  placeholder="Введите ваш телефон" name="p7"/>
   <p>
 <label for="p8">
   Рік останьої атестації:
 </label>
 <select name="p8">
 <option value="-">-</option>
 <?php
  $year = date('Y');

  echo"<option value=\"".$year."\">".$year."</option>";
  $year--;
 echo"<option value=\"".$year."\">".$year."</option>";
 $year--;
 echo"<option value=\"".$year."\">".$year."</option>";
 $year--;
 echo"<option value=\"".$year."\">".$year."</option>";
 $year--;
 echo"<option value=\"".$year."\">".$year."</option>";
 $year--;
 echo"<option value=\"".$year."\">".$year."</option>";
 $year--;
 echo"<option value=\"".$year."\">".$year."</option>";
 $year--;

 ?>
 </select>

 <p>
 <label for="p9">
   Категорія:
 </label>
 <select name="p9">
 <option value="1">Спеціаліст</option>
 <option value="2">Спеціаліст ІІ категорії</option>
 <option value="3">Спеціаліст І категорії</option>
 <option value="4">Спеціаліст вищої категорії</option>
 </select>


 <p>
 <label for="p10">
  Звання:
 </label>
 <select name="p10">
 <option value="-">-</option>
 <option value="2">Вчитель митодист</option>
 <option value="1">Старший вчитель</option>
 </select>

 <p>
 <label for="p11">
   Посада:
 </label>
 <select name="p11">
 <option value="1">Вчитель предметник</option>
 <option value="2">Вчитель логопед</option>
 <option value="3">Директор школи</option>
 <option value="4">Заступник директора з НВР</option>
 <option value="5">Заступник директора з ВР</option>
 <option value="6">Педагог організатор</option>
 <option value="7">Бібліотекар</option>
 <option value="8">Практичний психолог</option>
 <option value="9">Соціальний педагог</option>
 </select>

 <p>
 <label for="p12">
   Навчальний заклад, який закінчив та рік:
 </label>
<textarea name="p12" rows="5" cols="30"></textarea>
</td>
<td>

 <p>
 <label for="p13">
   Спеціальність за дипломом:
 </label>
 <input type="text" name="p13"/>
 <p>
 <label for="p14">
   Кваліфікація за дипломом:
 </label>
 <input type="text" name="p14"/>

  <p>
 <label for="p15">
   Не основний робітник (сумісник):
 </label>
 <input type="checkbox" name="p15" value="No"/>

  <p>
 <label for="p16">
   Працюе на за спеціальністю:
 </label>
 <input type="checkbox" name="p16" value="No"/>

  <p>
 <label for="p17">
   Дата прийняття на роботу:
 </label>
 <input type="date" name="p17"/>
  <p>
 <label for="p18">
   Стаж до прийняття на дану роботу (роки):
 </label>
 <input type="text" name="p18"/>
 <label for="p19">
   місяці:
 </label>
 <input type="text" name="p19"/>
  <p>
 <label for="p20">
   Дата останьої курсової перепідготовки:
 </label>
 <input type="date" name="p20"/>

 <p>
 <label for="p21">
   Класний керівник (клас):
 </label>
 <select name="p21">
 <option value="-">-</option>
 <option value="1">1</option>
  <option value="5">2</option>
   <option value="9">3</option>
    <option value="13">4</option>
     <option value="17">5</option>
      <option value="21">6</option>
       <option value="25">7</option>
        <option value="29">8</option>
         <option value="33">9</option>
          <option value="37">10</option>
           <option value="41">11</option>
 </select>

  <p>
 <label for="p22">
   клас (буква):
 </label>
 <select name="p22">
 <option value="0">-</option>
 <option value="1">А</option>
 <option value="2">Б</option>
 <option value="3">В</option>
 </select>
<div id="items">
<div>
<select name="pred1">
<option value ="0" selected>-</option>
<option value ="1">Українська мова</option>
<option value ="2">Українська література</option>
<option value ="3">Англійська мова</option>
<option value ="4">Зарубіжна література</option>
<option value ="5">Російська мова</option>
</select>
<input type="button" value="+" onClick="AddItem(this.parentNode)" >
</div>
</div>
 <p>
 <label for="p23">
   Примітки:
 </label>
<textarea name="p23" rows="5" cols="30">

</textarea>


<input type="submit" value="Зберегти"/>


</td>
</tr>
</table>
</div>
</form>
</body>
</html>