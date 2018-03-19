             <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                  <div class="row">
                                               <div class="col-sm-10 col-md-offset-1">
                                                     <h4 class="card-title">Manual de usuario</h4>      
                                               </div>

                                               <div class="col-sm-12">
                                               <center>
                                                     <p><b>Usted puede ingresar al sistema de información web desde un navegador como google chrome, Mozilla, opera y otros. 
A continuación se muestra los pasos a seguir para administrar el sistema de información web para el control de asistencia mediante RFID y carnetización de los comensales de la UNSXX.
</b></p> </center>     
                                               </div>
                                               
                                    </div>
                                    <div class="toolbar">
                                  <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">       
                                    </div>
                                    <div class="material-datatables">
                                        <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                           
                                           <div class="row">
                                           <div class="col-sm-12">
                                         <section  id="contenido_list">
                                           















                      <div class="row">
                        <div class="col-md-6">
                            <ul class="timeline timeline-simple">
                                <li class="timeline-inverted">
                                    <div class="timeline-badge danger">
                                        <strong>1</strong>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <span class="label label-danger">Crear un usuario</span>
                                        </div>
                                        <img src="manual/1.jpg" alt="..." class="img-thumbnail">
                                        <div class="timeline-body">
                                            <p>-Ingresar al sistema: </u></p>
                                            <p>-Registre los datos del formulario.</p>
                                            <p>-Una vez llenado el formulario presiona en Registrar.</p>
                                        </div>
                                        
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-badge success">
                                        3
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <span class="label label-success">Panel de administración</span>
                                        </div>
                                        <img src="manual/3.jpg" alt="..." class="img-thumbnail">
                                        <div class="timeline-body">
                                            <p>-Se muestra panel de administración del sistema.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-badge info">
                                        5
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <span class="label label-info">Tarjeta</span>
                                        </div>
                                        <img src="manual/5.jpg" alt="..." class="img-thumbnail">
                                        <div class="timeline-body">
                                            <p>- 1 Verificar tarjeta RFID.</p>
                                            <p>- 2 Registro nueva tarjeta.</p>
                                            <p>- 3 Lista de tarjetas registradas.</p>
                                            <p>- 4 Opciones de editar, eliminar, asignar tarjeta a un comensal.</p>
                                        </div>
                                        <img src="manual/5_1.jpg" alt="..." class="img-thumbnail">
                                        <div class="timeline-body">
                                            <p>- 5 Lista de tarjetas activas y permisos.</p>
                                            <p>- 6 Lista de tarjetas suspendidas o bloqueadas.</p>
                                            
                                        </div>
                                        <img src="manual/5_2.jpg" alt="..." class="img-thumbnail">
                                        <div class="timeline-body">
                                            <p>- 7 Formulario de registro de Tarjeta RFID.</p>
                                            <p>- 8 Campo de codigo RFID, para obtener el código de la tarjeta conectar el lector y pasar la tarjeta y automaticamente aparecera el código en el campo de registro.</p>    
                                        </div>
                                        <img src="manual/5_3.jpg" alt="..." class="img-thumbnail">
                                        <div class="timeline-body">
                                            <p>- 9 Registrar permiso a una tarjeta.</p>
                                            <p>- 10 Suspender tarjeta.</p>
                                        </div>
                                    </div>
                                </li>

                                <li class="timeline-inverted">
                                    <div class="timeline-badge danger">
                                        9
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <span class="label label-danger">Carreras o convenios</span>
                                        </div>
                                        <img src="manual/9.jpg" alt="..." class="img-thumbnail">
                                        <div class="timeline-body">
                                            <p>- 1 Registro de nueva carrera o convenio.</p>
                                            <p>- 2 Lista de carreras.</p>
                                            <p>- 3 Aciones editar, eliminar.</p>
                                        </div>
                                    </div>
                                </li>

                                <li class="timeline-inverted">
                                    <div class="timeline-badge success">
                                        11
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <span class="label label-success">Control de asistencia</span>
                                        </div>
                                        <img src="manual/11.jpg" alt="..." class="img-thumbnail">
                                        <div class="timeline-body">
                                            <p>- 1 Ingresar el rango de fecha ,presionar enviar para sacar el total de días de asistencia de los comensales.</p>
                                        </div>
                                        <img src="manual/11_2.jpg" alt="..." class="img-thumbnail">
                                        <div class="timeline-body">
                                            <p>- Resultado Lista  de asistencia por rango de fecha.</p>
                                        </div>
                                    </div>
                                </li>

                                <li class="timeline-inverted">
                                    <div class="timeline-badge info">
                                        14
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <span class="label label-info">Lista de asistencia</span>
                                        </div>
                                        <img src="manual/14.jpg" alt="..." class="img-thumbnail">
                                        <div class="timeline-body">
                                            <p>- 1 Opcion donde se puede realizar la carnetización de los comensales de manera general.</p>
                                            <p>- 2 Opcion donde se puede realizar la carnetización de manera individual.</p>
                                            <p>- 3 Lista de los comensales. </p>
                                           
                                        </div>
                                        <img src="manual/14_1.jpg" alt="..." class="img-thumbnail">
                                        <div class="timeline-body">
                                            <p>Formato de carnet de comensal</p>
                                           
                                           
                                        </div>
                                        
                                        
                                    </div>
                                </li>

                                <li class="timeline-inverted">
                                    <div class="timeline-badge danger">
                                        16
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <span class="label label-danger">Copias de seguridad</span>
                                        </div>
                                        <img src="manual/16.jpg" alt="..." class="img-thumbnail">
                                        <div class="timeline-body">
                                            <p>Se realiza la copia de seguridad de la base de datos.</p>
                                            <p>- 1 Realiza la copia de seguridad.</p>
                                            <p>- 2 Lista de copias de seguridad. realizadas.</p>
                                            <p>- 3 Restaurar la base de datos.</p>
                                           
                                        </div>  
                                    </div>
                                </li>

                                
                            </ul>
                        </div>














                        <div class="col-md-6">
                            <ul class="timeline timeline-simple">
                                <li class="timeline-inverted">
                                    <div class="timeline-badge danger">
                                        2
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <span class="label label-danger">Iniciar sesión</span>
                                        </div>
                                        <img src="manual/2.jpg" alt="..." class="img-thumbnail">
                                        <div class="timeline-body">
                                            <p>-Ingresar el nombre de usuario.</p>
                                            <p>-Ingresar la contraseña de usuario.</p>
                                            <p>-Presionar en Ingresar.</p>
                                        </div>
                                        
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-badge success">
                                        4
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <span class="label label-success">Comensales</span>
                                        </div>
                                        <img src="manual/4.jpg" alt="..." class="img-thumbnail">
                                        <div class="timeline-body">
                                            <p>- 1 Listar por carrera.</p>
                                            <p>- 2 Nuevo registro de comensal.</p>
                                            <p>- 3 Lista de comensales registrados.</p>
                                            <p>- 4 Aciones ,ver perfil, editar, eliminar.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-badge info">
                                        6
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <span class="label label-info">Eventuales</span>
                                        </div>
                                        <img src="manual/6.jpg" alt="..." class="img-thumbnail">
                                        <div class="timeline-body">
                                            <p>- 1 Registro de nuevo comensal eventual.</p>
                                            <p>- 2 Lista de comensales eventuales.</p>

                                       
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-badge info">
                                        7
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <span class="label label-info">Permisos</span>
                                        </div>
                                        <img src="manual/7.jpg" alt="..." class="img-thumbnail">
                                        <div class="timeline-body">
                                            <p>- 1 Lista de permisos registrados.</p>
                                            <p>- 2 Permisos vijentes.</p>
                                            <p>- 3 Permisos terminados.</p>
                                        </div>
                                    </div>
                                </li>

                                <li class="timeline-inverted">
                                    <div class="timeline-badge info">
                                        8
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <span class="label label-info">Suspendidos</span>
                                        </div>
                                        <img src="manual/8.jpg" alt="..." class="img-thumbnail">
                                        <div class="timeline-body">
                                            <p>- 1 Lista de comensales suspendidos.</p>
                                            <p>- 2 Suspendidos vijentes.</p>
                                            <p>- 3 Suspendidos terminados.</p>
                                        </div>
                                    </div>
                                </li>

                                <li class="timeline-inverted">
                                    <div class="timeline-badge danger">
                                        10
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <span class="label label-danger">Actividad</span>
                                        </div>
                                        <img src="manual/10.jpg" alt="..." class="img-thumbnail">
                                        <div class="timeline-body">
                                            <p>- 1 Registro nueva actividad.</p>
                                            <p>- 2 Lista de actividades.</p>
                                            <p>- 3 Acciones de editar, eliminar. </p>

                                       
                                        </div>
                                    </div>
                                </li>

                                <li class="timeline-inverted">
                                    <div class="timeline-badge success">
                                        12
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <span class="label label-success">Lista de asistencia</span>
                                        </div>
                                        <img src="manual/12.jpg" alt="..." class="img-thumbnail">
                                        <div class="timeline-body">
                                            <p>- Lista de asistencia de los comensales. </p>
                                           
                                        </div>
                                        
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-badge info">
                                        13
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <span class="label label-info">Asistencia</span>
                                        </div>
                                        <img src="manual/13.jpg" alt="..." class="img-thumbnail">
                                        <div class="timeline-body">
                                            <p>Primeramente antes de ingresar a la opcion de asistencia, conectar el lector de tarjeta RFID y ejecutar el archivo .bat <b>iniciar lector</b>,para iniciar el lector de tarjeta.</p>
                                            <p>- 1 Ingresar el numero de ficha asignado al comensal eventual y presionar en Enviar y se realizara el registro de asistencia.</p>
                                            <p>- 2 Ingresar el número de ficha, en caso si la el comensal se olvido o lo extravio la tarjeta.</p>
                                            <p> - 3 Campo donde aparece el codigo de la tarjeta el ser leido por el lector.</p>
                                            <p>- 4 Seccion donde aparece los datos personales del comensal al ser registrado su asistencia, tambien en esta seccion aparece si el estado de la tarjeta  esta activo, inactivo, permiso o suspendido.</p>
                                            <p>- 5 Lista donde aparece el registro de asistencia de los comensales de la fecha actual.</p>
                                        </div>
                                        
                                    </div>
                                </li>

                                <li class="timeline-inverted">
                                    <div class="timeline-badge danger">
                                        15
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <span class="label label-danger">Reportes</span>
                                        </div>
                                        <img src="manual/15.jpg" alt="..." class="img-thumbnail">
                                        <div class="timeline-body">
                                            <p>Se puede realizar el reporte de comensales, tarjetas ,permisos, suspendidos, eventuales y reporte de asistencia.</p>
                                            
                                        </div>
                                        
                                    </div>
                                </li>

                                <li class="timeline-inverted">
                                    <div class="timeline-badge danger">
                                        17
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <span class="label label-danger">Publicaciones</span>
                                        </div>
                                        <img src="manual/17.jpg" alt="..." class="img-thumbnail">
                                        <div class="timeline-body">
                                           <p> - 1 Nueva publicación.</p>
                                            <p>- 2 Lista de publicaciones.</p>
                                            <p>- 3 Opciones de edición editar, eliminar.</p>

                                        </div>
                                        
                                    </div>
                                </li>

                                
                            </ul>
                        </div>
                    </div>
















                                       </section>
                                        </div></div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
           
</div>



