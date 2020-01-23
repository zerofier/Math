<?php
function aut($nums) {
    $cnt = count($nums);
    if ($cnt == 1) return [$nums];
    $ret = [];
    for ($i = 0; $i < $cnt; $i++) {
        $sub_nums = [];
        if ($i == 0) {
            $sub_nums = array_slice($nums, 1);
        } elseif ($i == $cnt -1) {
            $sub_nums = array_slice($nums, 0, -1);
        } else {
            $sub_nums = array_merge(array_slice($nums, 0, $i), array_slice($nums, $i + 1, $cnt - $i));
        }
            
        foreach (aut($sub_nums) as $arr) {
            $ret[] = array_merge([$nums[$i]], $arr);
        }
    }
    return $ret;
}

function sgn($arr, $org = null) {
    $cnt = count($arr);
    $ret = 0;
    if ($org == null) $org = range(1, $cnt);
    for ($i = 0; $i < $cnt; $i++) {
        if ($i != array_search($arr[$i], $org)) $ret++;
    }
    
    return $ret;
}

function print_aut($item, $key, $cnt) {
    echo "(".join($item).",".sgn($item).")";
    if ($key < $cnt - 1) echo ",";
}

$dispatcher->route('/math-world/'.basename(__FILE__, '.php'), function() {
    common_head();
?>

<p>`A`は`n xx n`の正方行列</p>
<p>行列式 `det A = sum_(sigma in Aut(n)) sgn(sigma) prod_(i=1)^n a_(sigma(i))`</p>
<p>`Aut(n)`は置換全体になる</p>
<?php $n = 5; ?>
<?php $aut_ = aut(range(1, $n)); ?>
<p>例: `n = <?php echo $n?>`の場合</p>
<p>`Aut(n) = {<?php array_walk($aut_, 'print_aut', count($aut_))?>:}`</p>

<?php
    common_foot();
});