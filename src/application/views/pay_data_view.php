<?php $this->load->view('template/head'); ?>



<table class="easyui-datagrid" title="Pay_data"  style="width:auto;height:100%" id="grid_pay_data"

			data-options="singleSelect:true,url:'<?php echo base_url() ?>/index.php/pay_data/ajaxgrid',method:'post',toolbar:toolbar,autoRowHeight:false,fit:true,fitColumns:true,

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

         <th data-options="field:'client_id',width:80,sortable:true">Client_id</th>
         <th data-options="field:'gateway_id',width:80,sortable:true">Gateway_id</th>
         <th data-options="field:'customer_id',width:80,sortable:true">Customer_id</th>
         <th data-options="field:'cpf',width:80,sortable:true">CPF</th>


			</tr>

		</thead>

	</table>

	

	<div id="dlg_pay_data" class="easyui-dialog" style="width:230px;height:auto;" title="Crear pay_data" 

	data-options="	

	modal: true,

	closed:true,

	buttons: [{

					text:'Grabar',

					iconCls:'icon-ok',

					handler:function(){

			 $.messager.progress();

				

             $('#form_pay_data').form('submit', {

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

             $('#dlg_pay_data').dialog('close');

             $('#grid_pay_data').datagrid('reload');

             }

             });

					}

				},{

					text:'Cancelar',

					handler:function(){

						$('#dlg_pay_data').dialog('close');

					}

				}]"

	>

	<div style="padding:5px">

	    <form id="form_pay_data" method="post">

	    	<table>

         <tr><td>Client_id:</td><td><input class='easyui-validatebox' type='text' name='client_id' data-options='required:true'></input></td></tr>
         <tr><td>Gateway_id:</td><td><input class='easyui-validatebox' type='text' name='gateway_id' data-options='required:true'></input></td></tr>
         <tr><td>Customer_id:</td><td><input class='easyui-validatebox' type='text' name='customer_id' data-options='required:true'></input></td></tr>
         <tr><td>CPF:</td><td><input class='easyui-validatebox' type='text' name='cpf' data-options='required:true'></input></td></tr>


	    	</table>

	    </form>

	    </div>	

	

	</div>

	

	<input id="op" type="hidden"/>

	<script type="text/javascript">

		var toolbar = [{

			text:'Nuevo',

			iconCls:'icon-add',

			handler:function(){$('#form_pay_data').form('reset');$('#dlg_pay_data').dialog('open');$('#op').val('<?php echo base_url() ?>index.php/pay_data/save');}

		},{

			text:'Borrar',

			iconCls:'icon-remove',

			handler:function(){

			var row = $('#grid_pay_data').datagrid('getSelected');

			var rowSelect = $('#grid_pay_data').datagrid('getSelections');

                if(rowSelect.length>0){

			

                        $.messager.confirm('Eliminar', '�Est� seguro de querer borrar este registro?', function(r){

                            if (r){

                                $.ajax( {

                                    type : "POST",

                                    url : '<?php echo base_url(); ?>index.php/pay_data/delete/'+row.id,

                                    data : {

                                        

                                    },

                                    success: function (resp){

                                        $.messager.alert('Informaci�n','El registro se elimin� con �xito.','info');

										$('#grid_pay_data').datagrid('reload');

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

			var row = $('#grid_pay_data').datagrid('getSelected');

			$('#form_pay_data').form('reset');

            $('#form_pay_data').form('load','<?php echo base_url() ?>index.php/pay_data/load/'+row.id);

            $('#dlg_pay_data').dialog('open');

            $('#op').val('<?php echo base_url() ?>index.php/pay_data/update/'+row.id);

			}

		}];

		

		

		var cmenu;

    function createColumnMenu(){

        cmenu = $('<div/>').appendTo('body');

        cmenu.menu({

            onClick: function(item){

                if (item.iconCls == 'icon-ok'){

                    $('#grid_pay_data').datagrid('hideColumn', item.name);

                    cmenu.menu('setIcon', {

                        target: item.target,

                        iconCls: 'icon-empty'

                    });

                } else {

                    $('#grid_pay_data').datagrid('showColumn', item.name);

                    cmenu.menu('setIcon', {

                        target: item.target,

                        iconCls: 'icon-ok'

                    });

                }

            }

        });

        var fields = $('#grid_pay_data').datagrid('getColumnFields');

        for(var i=0; i<fields.length; i++){

            var field = fields[i];

            var col = $('#grid_pay_data').datagrid('getColumnOption', field);

            cmenu.menu('appendItem', {

                text: col.title,

                name: field,

                iconCls: 'icon-ok'

            });

        }

    }

	</script>

 <?php $this->load->view('template/footer'); ?>

