<div id="CandidatesAdminIndex">
    <h2>候選人</h2>
    <div class="clearfix"></div>
    <?php
    if (!empty($parents)) {
        foreach ($parents AS $parent) {
            if ($parent['Election']['rght'] - $parent['Election']['lft'] !== 1) {
                $this->Html->addCrumb($parent['Election']['name'], array(
                    'controller' => 'elections',
                    'action' => 'index', $parent['Election']['id'])
                );
            } else {
                $this->Html->addCrumb($parent['Election']['name'], array(
                    'action' => 'index', $parent['Election']['id'])
                );
            }
        }
    }
    if (!empty($electionId)) {
        $this->Html->addCrumb('新增候選人', array(
            'action' => 'add', $electionId)
        );
    }

    echo $this->Html->getCrumbs();
    ?>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <table class="table table-bordered" id="CandidatesAdminIndexTable">
        <thead>
            <tr>
                <th>選區</th>
                <th>候選人</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($items as $item) {
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
                ?>
                <tr<?php echo $class; ?>>
                    <td><?php
                        $c = array();
                        foreach ($item['Election'] AS $e) {
                            $c[] = $e['Election']['name'];
                            if ($e['Election']['rght'] - $e['Election']['lft'] === 1) {
                                echo $this->Html->link(implode(' > ', $c), array('action' => 'index', $e['Election']['id']));
                            }
                        }
                        ?></td>
                    <td><?php
                        echo $this->Html->link($item['Candidate']['name'], array('action' => 'view', $item['Candidate']['id']));
                        ?></td>
                </tr>
            <?php } // End of foreach ($items as $item) {   ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="CandidatesAdminIndexPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function() {
            $('#CandidatesAdminIndexTable th a, #CandidatesAdminIndex div.paging a').click(function() {
                $('#CandidatesAdminIndex').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>