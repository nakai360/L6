<?php
// 以下配列の中身をfor文を使用して表示してください。
// 表が縦横に伸びてもある程度対応できるように柔軟な作りを目指してください。
// 表示はHTMLの<table>タグを使用すること

/**
 * 表示イメージ
 *  _________________________
 *  |_____|_c1|_c2|_c3|横合計|
 *  |___r1|_10|__5|_20|___35|
 *  |___r2|__7|__8|_12|___27|
 *  |___r3|_25|__9|130|__164|
 *  |縦合計|_42|_22|162|__226|
 *  ‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
 */

$arr = [
    'r1' => ['c1' => 10, 'c2' => 5, 'c3' => 20],
    'r2' => ['c1' => 7, 'c2' => 8, 'c3' => 12],
    'r3' => ['c1' => 25, 'c2' => 9, 'c3' => 130]
];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>テーブル表示</title>
<style>
table {
    border:1px solid #000;
    border-collapse: collapse;
}
th, td {
    border:1px solid #000;
}
</style>
</head>
<body>
<table>
    <thead>
        <tr>
            <th></th>
            <?php
            // 列見出しを表示
            $c_total = array();
            $c_keys = array_keys($arr['r1']);
            for ($i = 0; $i < count($c_keys); $i++) {

                echo "<th>" . $c_keys[$i] . "</th>";
                
                $c_total[$c_keys[$i]] = 0;
            }
            echo "<th>横合計</th>";
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        // 行見出しとセルの値を表示
        $r_total = array();
        $r_keys = array_keys($arr);
        for ($i = 0; $i < count($r_keys); $i++) {
            $r_name = $r_keys[$i];

            echo "<tr>";
            echo "<th>$r_name</th>";

            $r_total = 0;
            for ($j = 0; $j < count($c_keys); $j++) {
                $c_name = $c_keys[$j];
                $val = $arr[$r_name][$c_name];

                echo "<td>$val</td>";

                $c_total[$c_name] += $val;
                $r_total += $val;
            }
            echo "<td>$r_total</td>";
            echo "</tr>";
        }
        ?>
        <tr>
            <th>縦合計</th>
            <?php
            // 縦合計を表示
            $total = 0;
            for ($i = 0; $i < count($c_keys); $i++) {
                $c_name = $c_keys[$i];
                $c2_total = $c_total[$c_name];

                echo "<td>$c2_total</td>";

                $total += $c2_total;
            }
            echo "<td>$total</td>";
            ?>
        </tr>
    </tbody>
</table>
</body>
</html>