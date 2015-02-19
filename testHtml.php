<table>
    <?php for($i = 7; $i >= 0; $i--) { ?>
    <tr>
        <?php for($k = 0; $k < 8; $k++) { ?>
        <td id="<?= $k . 'x' . $i; ?>">
        </td>
        <?php } ?>
    </tr>
    <?php } ?>
</table>
<script src="/javascript/libs/jquery.js"></script>