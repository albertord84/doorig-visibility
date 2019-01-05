<?php $this->load->view('template/head'); ?>



<table class="easyui-datagrid" title="Modules"  style="width:auto;height:100%" id="grid_modules"

			data-options="singleSelect:true,url:'<?php echo base_url() ?>/index.php/modules/ajaxgrid',method:'post',toolbar:toolbar,autoRowHeight:false,fit:true,fitColumns:true,

				pagination:true,

				onHeaderContextMenu: function(e, field){

					e.preventDefault();

					if (!cmenu){

						createColumnMenu();

					}

					cmenu.menu('show', {

						left:e.pageX,

						top:e.pageY

					});

				},

				multiSort:true,

				pageSize:20">

		<thead>

			<tr>

         <th data-options="field:'name',width:80,sortable:true">Name</th>
         <th data-options="field:'description',width:80,sortable:true">Description</th>


			</tr>

		</thead>

	</table>

	

	<div id="dlg_modules" class="easyui-dialog" style="width:230px;height:auto;" title="Crear modules" 

	data-options="	

	modal: true,

	closed:true,

	buttons: [{

					text:'Grabar',

					iconCls:'icon-ok',

					handler:function(){

			 $.messager.progress();

				

             $('#form_modules').form('submit', {

             url: $('#op').val(),

             onSubmit: function(){

             var isValid = $(this).form('validate');

             if (!isValid){

             $.messager.progress('close');	 

			 $.messager.alert('Error en datos','Hay campos con datos incorrectos','error');

             }

             return isValid;	

             },

             success: function(){

             $.messager.progress('close');

             $.messager.alert('Info', 'Registro guardado correctamente.', 'info');

             $('#dlg_modules').dialog('close');

             $('#grid_modules').datagrid('reload');

             }

             });

					}

				},{

					text:'Cancelar',

					handler:function(){

						$('#dlg_modules').dialog('close');

					}

				}]"

	>

	<div style="padding:5px">

	    <form id="form_modules" method="post">

	    	<table>

         <tr><td>Name:</td><td><input class='easyui-validatebox' type='text' name='name' data-options='required:true'></input></td></tr>
         <tr><td>Description:</td><td><input class='easyui-validatebox' type='text' name='description' data-options='required:true'></input></td></tr>


	    	</table>

	    </form>

	    </div>	

	

	</div>

	

	<input id="op" type="hidden"/>

	<script type="text/javascript">

		var toolbar = [{

			text:'Nuevo',

			iconCls:'icon-add',

			handler:function(){$('#form_modules').form('reset');$('#dlg_modules').dialog('open');$('#op').val('<?php echo base_url() ?>index.php/modules/save');}

		},{

			text:'Borrar',

			iconCls:'icon-remove',

			handler:function(){

			var row = $('#grid_modules').datagrid('getSelected');

			var rowSelect = $('#grid_modules').datagrid('getSelections');

                if(rowSelect.length>0){

			

                        $.messager.confirm('Eliminar', '�Est� seguro de querer borrar este registro?', function(r){

                            if (r){

                                $.ajax( {

                                    type : "POST",

                                    url : '<?php echo base_url(); ?>index.php/modules/delete/'+row.id,

                                    data : {

                                        

                                    },

                                    success: function (resp){

                                        $.messager.alert('Informaci�n','El registro se elimin� con �xito.','info');

										$('#grid_modules').datagrid('reload');

                                    },

									error:function(resp)

									{

										var d = resp.responseText;

										$.messager.alert('Error',d,'error');

                            

									}

                                });

                                

                            }

                        });

				}

				

			}

		},'-',{

			text:'Modificar',

			iconCls:'icon-edit',

			handler:function(){

			var row = $('#grid_modules').datagrid('getSelected');

			$('#form_modules').form('reset');

            $('#form_modules').form('load','<?php echo base_url() ?>index.php/modules/load/'+row.id);

            $('#dlg_modules').dialog('open');

            $('#op').val('<?php echo base_url() ?>index.php/modules/update/'+row.id);

			}

		}];

		

		

		var cmenu;

    function createColumnMenu(){

        cmenu = $('<div/>').appendTo('body');

        cmenu.menu({

            onClick: function(item){

                if (item.iconCls == 'icon-ok'){

                    $('#grid_modules').datagrid('hideColumn', item.name);

                    cmenu.menu('setIcon', {

                        target: item.target,

                        iconCls: 'icon-empty'

                    });

                } else {

                    $('#grid_modules').datagrid('showColumn', item.name);

                    cmenu.menu('setIcon', {

                        target: item.target,

                        iconCls: 'icon-ok'

                    });

                }

            }

        });

        var fields = $('#grid_modules').datagrid('getColumnFields');

        for(var i=0; i<fields.length; i++){

            var field = fields[i];

            var col = $('#grid_modules').datagrid('getColumnOption', field);

            cmenu.menu('appendItem', {

                text: col.title,

                name: field,

                iconCls: 'icon-ok'

            });

        }

    }

	</script>

 <?php $this->load->view('template/footer'); ?>

