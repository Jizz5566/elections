<div id="AreasAdminEdit">
    <?php echo $this->Form->create('Area', array('type' => 'file')); ?>
    <div class="Areas form">
        <fieldset>
            <legend><?php
                echo __('Edit Areas', true);
                ?></legend>
            <?php
            echo $this->Form->input('Area.id');
            echo $this->Form->input('Area.name', array(
                'label' => 'Name',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Area.is_area', array(
                'label' => 'Is Area?',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Area.ivid', array(
                'label' => 'Ivid',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Area.code', array(
                'label' => 'Code',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Area.population', array(
                'type' => 'text',
                'label' => '選區人口',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Area.population_electors', array(
                'type' => 'text',
                'label' => '選舉人數量',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Area.polygons', array(
                'type' => 'textarea',
                'label' => 'GeoJSON polygons',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            ?>
        </fieldset>
    </div>
    <?php
    echo $this->Form->end(__('Submit', true));
    ?>
</div>