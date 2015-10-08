<div class="row" id="CandidatesAdminIndex">
    <div class="col-md-12">
        <?php
        $currentElection = array();
        if (!empty($parents)) {
            echo '<h1 class="text-info">';
            foreach ($parents AS $parent) {
                echo $parent['Election']['name'] . '&nbsp;';
            }
            echo '候選人</h1>';
        } else {
            echo $this->Html->tag('h1', '候選人');
        }
        ?>
        <p>&nbsp;</p>
        <?php
        if (!empty($electionId)) {
        ?>
            <div class="alert alert-success">
                漏了候選人嗎？立即
                <?php echo $this->Html->link('新增候選人', array('action' => 'add', $electionId)); ?>。
            </div>
        <?php
        }
        ?>
        <div class="pull-right btn-group">
            <?php
            if (!empty($currentElection['bulletin_key'])) {
                echo $this->Html->link('選舉公報', '/bulletins/view/' . $currentElection['bulletin_key'], array('class' => 'btn btn-primary'));
            }
            if (!empty($electionId)) {
                echo $this->Html->link('本頁 API', '/api/elections/candidates/' . $electionId, array('class' => 'btn btn-default', 'target' => '_blank'));
            }
            ?>
        </div>
    </div>
    <p>&nbsp;</p>
    <?php
    if (!empty($currentElection['population_electors'])) {
        echo '<div class="col-md-12">';
        $quota = "名額： {$currentElection['quota']}";
        if (!empty($currentElection['quota_women'])) {
            $quota .= " / 婦女保障： {$currentElection['quota_women']}";
        }
        echo " &nbsp; &nbsp; ( {$quota} / 選舉人： {$currentElection['population_electors']} / 人口： {$currentElection['population']} )";
        echo '</div>';
    }
    ?>
    <div class="clearfix"></div>
    <div class="paginator-wrapper col-md-12">
        <?php echo $this->element('paginator'); ?>
    </div>
    <?php
    if (!empty($items)) {
        foreach ($items AS $candidate) {
            ?><div class="col-md-2 col-sm-6 col-xs-6">
                <div class="thumbnail candidate-<?php echo $candidate['Candidate']['stage']; ?>">
                    <div class="candidate-image-wrapper">
                        <a href="<?php echo $this->Html->url('/candidates/view/' . $candidate['Candidate']['id']); ?>">
                            <?php
                            if (empty($candidate['Candidate']['image'])) {
                                echo $this->Html->image('candidate-not-found.jpg', array('class' => 'candidate-image'));
                            } else {
                                echo $this->Html->image('../media/' . $candidate['Candidate']['image'], array('class' => 'candidate-image'));
                            }
                            ?>
                        </a>
                    </div>
                    <div class="caption">
                        <?php
                        echo $this->Html->link(
                            $this->Html->tag('h3', $candidate['Candidate']['name']),
                            '/candidates/view/' . $candidate['Candidate']['id'],
                            array('escape' => false)
                            );
                        echo $this->Html->para(null, $candidate['Candidate']['party']);
                        if(!empty($candidate['Candidate']['no'])) {
                            echo $this->Html->para(null, $candidate['Candidate']['no'] . '號');
                        }
                        ?>
                    </div>
                </div>
            </div><?php
        }
    } else {
        echo ' ~ 目前沒有候選人資料 ~ ';
    }
    ?>
    <div class="clearfix"></div>
    <div class="paginator-wrapper col-md-12">
        <?php echo $this->element('paginator'); ?>
    </div>
    <?php if (!empty($electionId)) { ?>
        <div id="vanilla-comments"></div>
        <script type="text/javascript">
            var vanilla_forum_url = '<?php echo $this->Html->url('/../talk'); ?>',
                vanilla_identifier = '<?php echo $electionId; ?>',
                vanilla_url = '<?php echo $this->Html->url('/candidates/index/' . $electionId, true); ?>';

            (function () {
                var vanilla = document.createElement('script');
                vanilla.type = 'text/javascript';
                var timestamp = new Date().getTime();
                vanilla.src = vanilla_forum_url + '/js/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(vanilla);
            })();
        </script>
    <?php } ?>
</div>