<?php
class Helper extends Config
{
    public static function can($role)
    {
        if ($_SESSION['sys_name'] == $role) {
            return true;
        }
        return false;
    }

    public static function printOptions($options = array())
    {
        if ($options) {
            foreach ($options as $option) {
                ?>
                <option value="<?= $option['id'] ?>">
                    <?= $option['value'] ?>
                </option>
                <?php
            }
        }
    }
}
?>