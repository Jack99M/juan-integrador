<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte General Completo</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #333; line-height: 1.5; }
        .header { background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%); color: white; padding: 35px; text-align: center; }
        .header h1 { font-size: 26px; margin-bottom: 8px; font-weight: bold; }
        .header .subtitle { font-size: 12px; opacity: 0.9; }
        .container { padding: 20px; }
        
        .executive-summary { background: #f8f9fa; padding: 18px; border-radius: 8px; margin: 15px 0; border-left: 5px solid #2c3e50; }
        .executive-summary h2 { color: #2c3e50; font-size: 18px; margin-bottom: 12px; }
        
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin: 15px 0; }
        .stat-box { text-align: center; padding: 15px; background: white; border-radius: 6px; box-shadow: 0 2px 4px rgba(0,0,0,0.08); border-top: 3px solid #2c3e50; }
        .stat-number { font-size: 28px; font-weight: bold; color: #2c3e50; }
        .stat-label { font-size: 11px; color: #666; text-transform: uppercase; margin-top: 4px; }
        
        .section-title { font-size: 16px; color: #2c3e50; border-bottom: 2px solid #2c3e50; padding-bottom: 6px; margin: 18px 0 12px; font-weight: bold; }
        
        .percentage-box { background: white; padding: 15px; border-radius: 6px; margin: 12px 0; box-shadow: 0 2px 4px rgba(0,0,0,0.08); }
        .percentage-title { font-size: 14px; font-weight: bold; color: #2c3e50; margin-bottom: 12px; }
        .percentage-bar { margin: 12px 0; }
        .percentage-label { display: flex; justify-content: space-between; margin-bottom: 4px; font-size: 12px; }
        .bar { height: 20px; border-radius: 4px; position: relative; background: #e9ecef; overflow: hidden; }
        .bar-fill { height: 100%; border-radius: 4px; transition: width 0.3s; float: left; }
        .bar-fill.manipuladas { background: #dc3545; }
        .bar-fill.limpias { background: #28a745; }
        .bar-fill.sospechosas { background: #ffc107; }
        
        .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin: 12px 0; }
        .info-card { background: #f8f9fa; padding: 12px; border-radius: 6px; border-left: 3px solid #2c3e50; }
        .info-item { display: flex; justify-content: space-between; padding: 4px 0; font-size: 11px; }
        
        .metric-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; margin: 12px 0; }
        .metric-card { background: white; padding: 12px; border-radius: 6px; text-align: center; box-shadow: 0 2px 4px rgba(0,0,0,0.08); }
        .metric-value { font-size: 24px; font-weight: bold; color: #2c3e50; }
        .metric-label { font-size: 10px; color: #666; text-transform: uppercase; margin-top: 3px; }
        
        table { width: 100%; border-collapse: collapse; margin: 10px 0; font-size: 11px; }
        th { background: #2c3e50; color: white; padding: 8px; text-align: left; }
        td { padding: 6px 8px; border-bottom: 1px solid #ddd; }
        tr:nth-child(even) { background: #f8f9fa; }
        
        .highlight-box { background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%); color: white; padding: 15px; border-radius: 6px; margin: 12px 0; text-align: center; }
        .highlight-number { font-size: 32px; font-weight: bold; margin-bottom: 5px; }
        .highlight-text { font-size: 12px; opacity: 0.9; }
        
        .two-col { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
        
        .footer { text-align: center; padding: 15px; color: #999; font-size: 10px; border-top: 2px solid #eee; margin-top: 30px; }
        
        .page-break { page-break-after: always; }
    </style>
</head>
<body>
    <div class="header">
        <h1>REPORTE GENERAL COMPLETO DEL SISTEMA</h1>
        <div class="subtitle">Análisis Exhaustivo de Estadísticas y Métricas | Generado el {{ date('d/m/Y H:i:s') }}</div>
    </div>

    <div class="container">
        <div class="executive-summary">
            <h2> RESUMEN DEL SISTEMA</h2>
            <div class="stats-grid">
                <div class="stat-box">
                    <div class="stat-number">{{ $stats['total_imagenes'] }}</div>
                    <div class="stat-label">Total Imágenes</div>
                </div>
                <div class="stat-box">
                    <div class="stat-number">{{ $stats['total_usuarios'] }}</div>
                    <div class="stat-label">Usuarios Activos</div>
                </div>
                <div class="stat-box">
                    <div class="stat-number">{{ $stats['total_analisis'] }}</div>
                    <div class="stat-label">Total Análisis</div>
                </div>
                <div class="stat-box">
                    <div class="stat-number">{{ $stats['total_exif'] }}</div>
                    <div class="stat-label">Datos EXIF</div>
                </div>
            </div>
        </div>

        <!-- DISTRIBUCIÓN DE RESULTADOS -->
        <div class="section-title"> Distribución de Resultados de Análisis</div>
        <div class="percentage-box">
            <div class="percentage-bar">
                <div class="percentage-label">
                    <span><strong>Imágenes Manipuladas</strong></span>
                    <span><strong>{{ $stats['manipuladas'] }}</strong> ({{ $stats['porcentaje_manipuladas'] }}%)</span>
                </div>
                <div class="bar">
                    <div class="bar-fill manipuladas" style="width: {{ $stats['porcentaje_manipuladas'] }}%"></div>
                </div>
            </div>

            <div class="percentage-bar">
                <div class="percentage-label">
                    <span><strong>Imágenes Auténticas/Limpias</strong></span>
                    <span><strong>{{ $stats['limpias'] }}</strong> ({{ $stats['porcentaje_limpias'] }}%)</span>
                </div>
                <div class="bar">
                    <div class="bar-fill limpias" style="width: {{ $stats['porcentaje_limpias'] }}%"></div>
                </div>
            </div>

            <div class="percentage-bar">
                <div class="percentage-label">
                    <span><strong>Imágenes Sospechosas</strong></span>
                    <span><strong>{{ $stats['sospechosas'] }}</strong> ({{ $stats['porcentaje_sospechosas'] }}%)</span>
                </div>
                <div class="bar">
                    <div class="bar-fill sospechosas" style="width: {{ $stats['porcentaje_sospechosas'] }}%"></div>
                </div>
            </div>
        </div>

        <!-- MÉTRICAS CLAVE DE RENDIMIENTO -->
        <div class="section-title"> Métricas Clave de Rendimiento (KPIs)</div>
        <div class="metric-grid">
            <div class="metric-card">
                <div class="metric-value">{{ $stats['tasa_completados'] }}%</div>
                <div class="metric-label">Tasa de Completados</div>
            </div>
            <div class="metric-card">
                <div class="metric-value">{{ $stats['tasa_exito'] }}%</div>
                <div class="metric-label">Tasa de Éxito</div>
            </div>
            <div class="metric-card">
                <div class="metric-value">{{ round($probabilidadPromedio ?? 0, 2) }}%</div>
                <div class="metric-label">Prob. Media Manipulación</div>
            </div>
        </div>

        <!-- ESTADO DE PROCESAMIENTO -->
        <div class="section-title"> Estado de Procesamiento de Análisis</div>
        <div class="info-grid">
            @foreach($porEstado as $estado)
            <div class="info-card">
                <div class="info-item">
                    <span><strong>{{ ucfirst($estado->estado) }}</strong></span>
                    <span><strong>{{ $estado->total }}</strong> ({{ $stats['total_analisis'] > 0 ? round(($estado->total / $stats['total_analisis']) * 100, 1) : 0 }}%)</span>
                </div>
            </div>
            @endforeach
        </div>

        <!-- DISTRIBUCIÓN POR RESULTADO -->
        <div class="section-title"> Distribución Detallada por Resultado</div>
        <table>
            <thead>
                <tr>
                    <th>Resultado</th>
                    <th style="text-align: center;">Cantidad</th>
                    <th style="text-align: center;">Porcentaje</th>
                    <th style="width: 40%;">Barra Visual</th>
                </tr>
            </thead>
            <tbody>
                @foreach($porResultado as $resultado)
                <tr>
                    <td><strong>{{ ucfirst($resultado->resultado) }}</strong></td>
                    <td style="text-align: center;">{{ $resultado->total }}</td>
                    <td style="text-align: center;">{{ $stats['total_analisis'] > 0 ? round(($resultado->total / $stats['total_analisis']) * 100, 2) : 0 }}%</td>
                    <td>
                        <div class="bar" style="height: 15px;">
                            <div class="bar-fill" style="width: {{ $stats['total_analisis'] > 0 ? ($resultado->total / $stats['total_analisis']) * 100 : 0 }}%; background: #2c3e50;"></div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="page-break"></div>

        <!-- ANÁLISIS DE DATOS EXIF -->
        <div class="section-title"> Análisis de Metadatos EXIF</div>
        <div class="two-col">
            <div class="highlight-box">
                <div class="highlight-number">{{ $stats['imagenes_con_exif'] }}</div>
                <div class="highlight-text">Imágenes con Datos EXIF</div>
            </div>
            <div class="highlight-box" style="background: #6c757d;">
                <div class="highlight-number">{{ $stats['imagenes_sin_exif'] }}</div>
                <div class="highlight-text">Imágenes sin Datos EXIF</div>
            </div>
        </div>

        <!-- TOP FABRICANTES DE CÁMARAS -->
        @if($fabricantesCamaras->count() > 0)
        <div class="section-title"> Top 10 Fabricantes de Cámaras</div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fabricante</th>
                    <th style="text-align: center;">Cantidad</th>
                    <th style="width: 40%;">Participación</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fabricantesCamaras as $index => $fabricante)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><strong>{{ $fabricante->fabricante_camara }}</strong></td>
                    <td style="text-align: center;">{{ $fabricante->total }}</td>
                    <td>
                        <div class="bar" style="height: 15px;">
                            <div class="bar-fill" style="width: {{ ($fabricante->total / $fabricantesCamaras->sum('total')) * 100 }}%; background: #28a745;"></div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        <!-- TOP MODELOS DE CÁMARAS -->
        @if($modelosCamaras->count() > 0)
        <div class="section-title"> Top 10 Modelos de Cámaras</div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Modelo</th>
                    <th style="text-align: center;">Cantidad</th>
                    <th style="width: 40%;">Participación</th>
                </tr>
            </thead>
            <tbody>
                @foreach($modelosCamaras as $index => $modelo)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><strong>{{ $modelo->modelo_camara }}</strong></td>
                    <td style="text-align: center;">{{ $modelo->total }}</td>
                    <td>
                        <div class="bar" style="height: 15px;">
                            <div class="bar-fill" style="width: {{ ($modelo->total / $modelosCamaras->sum('total')) * 100 }}%; background: #17a2b8;"></div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        <!-- ESTADÍSTICAS POR FORMATO -->
        <div class="section-title"> Distribución por Formato de Imagen</div>
        @if($porFormato->count() > 0)
        <div class="info-grid">
            @foreach($porFormato as $formato)
            @php
                $tipoFormato = strtoupper(str_replace('image/', '', $formato->mime ?? 'DESCONOCIDO'));
                if ($tipoFormato === 'JPEG') $tipoFormato = 'JPG';
            @endphp
            <div class="info-card">
                <div class="info-item">
                    <span><strong>{{ $tipoFormato }}</strong></span>
                    <span><strong>{{ $formato->total }}</strong> ({{ $stats['total_imagenes'] > 0 ? round(($formato->total / $stats['total_imagenes']) * 100, 1) : 0 }}%)</span>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <!-- USUARIOS MÁS ACTIVOS -->
        @if($usuariosMasActivos->count() > 0)
        <div class="section-title"> Top 5 Usuarios Más Activos</div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th style="text-align: center;">Imágenes Subidas</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuariosMasActivos as $index => $usuario)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><strong>{{ $usuario->nombre }} {{ $usuario->apellido_paterno }}</strong></td>
                    <td>{{ $usuario->email }}</td>
                    <td style="text-align: center;"><strong>{{ $usuario->imagenes_count }}</strong></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        <!-- ACTIVIDAD RECIENTE -->
        @if($imagenesPorDia->count() > 0)
        <div class="section-title"> Actividad de los Últimos 7 Días</div>
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th style="text-align: center;">Imágenes Subidas</th>
                    <th style="width: 50%;">Tendencia</th>
                </tr>
            </thead>
            <tbody>
                @foreach($imagenesPorDia as $dia)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($dia->fecha)->format('d/m/Y') }}</td>
                    <td style="text-align: center;"><strong>{{ $dia->total }}</strong></td>
                    <td>
                        <div class="bar" style="height: 15px;">
                            <div class="bar-fill" style="width: {{ ($dia->total / $imagenesPorDia->max('total')) * 100 }}%; background: #ffc107;"></div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        <!-- INDICADORES FINALES -->
        <div class="section-title"> Indicadores Consolidados</div>
        <div class="info-card" style="margin-bottom: 10px;">
            <div class="info-item">
                <span>Tasa de Detección de Manipulación</span>
                <span><strong>{{ $stats['porcentaje_manipuladas'] }}%</strong></span>
            </div>
            <div class="info-item">
                <span>Tasa de Imágenes Auténticas</span>
                <span><strong>{{ $stats['porcentaje_limpias'] }}%</strong></span>
            </div>
            <div class="info-item">
                <span>Tasa de Imágenes Sospechosas</span>
                <span><strong>{{ $stats['porcentaje_sospechosas'] }}%</strong></span>
            </div>
            <div class="info-item">
                <span>Total de Análisis Completados</span>
                <span><strong>{{ $stats['completados'] }}</strong></span>
            </div>
            <div class="info-item">
                <span>Total de Análisis Fallidos</span>
                <span><strong>{{ $stats['fallidos'] }}</strong></span>
            </div>
            <div class="info-item">
                <span>Análisis en Proceso</span>
                <span><strong>{{ $stats['procesando'] }}</strong></span>
            </div>
            <div class="info-item">
                <span>Análisis en Cola</span>
                <span><strong>{{ $stats['pendientes'] }}</strong></span>
            </div>
        </div>
    </div>

    <div class="footer">
        <strong>Sistema de Verificación de Imágenes Digitales</strong><br>
        Reporte general | Confidencial | © {{ date('Y') }} Todos los derechos reservados
    </div>
</body>
</html>
