<section class="content">
    <header class="main-header clearfix">
        <h1 class="main-header__title">
            <i class="fa fa-users"></i>
            Contacts
        </h1>
        <div class="main-header__date">
            <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'email_contents', 'action' => 'addcontact')); ?>" class="btn btn-light pull-right">Add Contact</a>
        </div>
    </header>

    <div class="row">

        <div class="col-md-12">
            <article class="widget">

                <div id="content_admin" class="admin_content_block grid-wrap">
                    <div style="clear:both"></div>
                    <table  width="100%" id="list" align="center">
                    </table>
                    <div id="pager" ></div>
                </div>

                <form id="form_sendMail" action='<?php echo $this->html->url(array("admin" => true, "controller" => "email_contents", "action" => "mail")); ?>' method="post" enctype="multipart/form-data" onsubmit="return validate();">
                    <input type="hidden" name="user_ids" id="user_ids" />
                    <input type="submit" class="btn btn-primary" id="sendMail" name="sendMail" value="Send Mail">
                </form>


            </article><!-- /widget -->
        </div>

    </div> <!-- /row -->
</section> <!-- /content -->


<script>

    $Grid = $("#list");

    $(function() {

        $("#list").jqGrid({
            url: '<?php echo $this->Html->url(array("controller" => "email_contents", "action" => "contactgrid")); ?>',
            datatype: "json",
            mtype: 'GET',
            colNames: ['S No', 'Name', 'Email Address', 'Contact No', 'Action'],
            colModel: [
                {name: 'id', index: 'id', width: 20, align: 'center', stype: 'text', sorttype: 'int', sortable: true},
                {name: 'title', index: 'title', width: 40, align: 'left', stype: 'text', sortable: true},
                {name: 'imgCount', index: 'imgCount', width: 40, align: 'center', stype: '', sortable: false},
                {name: 'keywords', index: 'keywords', width: 100, align: 'left', stype: 'text', sortable: false},
                {name: 'action', index: '', width: 20, align: 'center', stype: '', sortable: false, search: false}
            ],
            pager: jQuery('#pager'),
            rowNum: 10,
            rowList: [5, 10, 15],
            sortname: 'id',
            sortorder: 'asc',
            viewrecords: true,
            gridview: true,
            hidegrid: false,
            multiselect: false,
            height: "100%",
            autowidth: true,
            shrinkToFit: true,
            multiselect: true,
        });

        $("#list").jqGrid('navGrid', '#pager', {edit: false, add: false, del: false, search: false, refresh: true});

    });

    $(window).resize(function() {
        $Grid.setGridWidth($(".admin_content_block").width());
    });


    function changeContactstatus(id, status) {

        URL = '<?php echo $this->Html->url(array("controller" => "email_contents", "action" => "changeContactstatus")); ?>';
        $.ajax({
            url: URL,
            type: "POST",
            data: ({id: id, status: status}),
            beforeSend: function(XMLHttpRequest) {

            },
            complete: function(XMLHttpRequest, textStatus) {

            },
            success: function(data) {
                $("#list").trigger("reloadGrid");
            }
        });


    }

    function deleteContact(id) {
        URL = '<?php echo $this->Html->url(array("controller" => "email_contents", "action" => "deleteContact")); ?>';
        $.ajax({
            url: URL,
            type: "POST",
            data: ({id: id, status: status}),
            beforeSend: function(XMLHttpRequest) {

            },
            complete: function(XMLHttpRequest, textStatus) {

            },
            success: function(data) {
                $("#list").trigger("reloadGrid");
            }
        });
    }


    function validate() {
        var users;
        users = $("#list").jqGrid('getGridParam', 'selarrrow');
        if (users == '') {
            alert('Please select users.');
            return false;
        } else {
            $("#user_ids").val(users);
            $("#form_sendMail").submit();
        }

    }
</script>