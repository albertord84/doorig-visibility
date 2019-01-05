<?php $this->load->view('template/head'); ?>



<table class="easyui-datagrid" title="Clients"  style="width:auto;height:100%" id="grid_clients"

			data-options="singleSelect:true,url:'<?php echo base_url() ?>/index.php/clients/ajaxgrid',method:'post',toolbar:toolbar,autoRowHeight:false,fit:true,fitColumns:true,

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

         <th data-options="field:'pay_id',width:80,sortable:true">Pay_id</th>
         <th data-options="field:'login_token',width:80,sortable:true">Login_token</th>


			</tr>

		</thead>

	</table>

	

	<div id="dlg_clients" class="easyui-dialog" style="width:230px;height:auto;" title="Crear clients" 

	data-options="	

	modal: true,

	closed:true,

	buttons: [{

					text:'Grabar',

					iconCls:'icon-ok',

					handler:function(){

			 $.messager.progress();

				

             $('#form_clients').form('submit', {

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

             $('#dlg_clients').dialog('close');

             $('#grid_clients').datagrid('reload');

             }

             });

					}

				},{

					text:'Cancelar',

					handler:function(){

						$('#dlg_clients').dialog('close');

					}

				}]"

	>

	<div style="padding:5px">

	    <form id="form_clients" method="post">

	    	<table>

         <tr><td>Pay_id:</td><td><input class='easyui-validatebox' type='text' name='pay_id' data-options='required:true'></input></td></tr>
         <tr><td>Login_token:</td><td><input class='easyui-validatebox' type='text' name='login_token' data-options='required:true'></input></td></tr>


	    	</table>

	    </form>

	    </div>	

	

	</div>

	

	<input id="op" type="hidden"/>

	<script type="text/javascript">

		var toolbar = [{

			text:'Nuevo',

			iconCls:'icon-add',

			handler:function(){$('#form_clients').form('reset');$('#dlg_clients').dialog('open');$('#op').val('<?php echo base_url() ?>index.php/clients/save');}

		},{

			text:'Borrar',

			iconCls:'icon-remove',

			handler:function(){

			var row = $('#grid_clients').datagrid('getSelected');

			var rowSelect = $('#grid_clients').datagrid('getSelections');

                if(rowSelect.length>0){

			

                        $.messager.confirm('Eliminar', '�Est� seguro de querer borrar este registro?', function(r){

                            if (r){

                                $.ajax( {

                                    type : "POST",

                                    url : '<?php echo base_url(); ?>index.php/clients/delete/'+row.id,

                                    data : {

                                        

                                    },

                                    success: function (resp){

                                        $.messager.alert('Informaci�n','El registro se elimin� con �xito.','info');

										$('#grid_clients').datagrid('reload');

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

			var row = $('#grid_clients').datagrid('getSelected');

			$('#form_clients').form('reset');

            $('#form_clients').form('load','<?php echo base_url() ?>index.php/clients/load/'+row.id);

            $('#dlg_clients').dialog('open');

            $('#op').val('<?php echo base_url() ?>index.php/clients/update/'+row.id);

			}

		}];

		

		

		var cmenu;

    function createColumnMenu(){

        cmenu = $('<div/>').appendTo('body');

        cmenu.menu({

            onClick: function(item){

                if (item.iconCls == 'icon-ok'){

                    $('#grid_clients').datagrid('hideColumn', item.name);

                    cmenu.menu('setIcon', {

                        target: item.target,

                        iconCls: 'icon-empty'

                    });

                } else {

                    $('#grid_clients').datagrid('showColumn', item.name);

                    cmenu.menu('setIcon', {

                        target: item.target,

                        iconCls: 'icon-ok'

                    });

                }

            }

        });

        var fields = $('#grid_clients').datagrid('getColumnFields');

        for(var i=0; i<fields.length; i++){

            var field = fields[i];

            var col = $('#grid_clients').datagrid('getColumnOption', field);

            cmenu.menu('appendItem', {

                text: col.title,

                name: field,

                iconCls: 'icon-ok'

            });

        }

    }

	</script>

 <?php $this->load->view('template/footer'); ?>

