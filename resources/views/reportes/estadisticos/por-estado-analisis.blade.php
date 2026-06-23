<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte por Estado de Análisis</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #333; line-height: 1.6; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; text-align: center; }
        .header h1 { font-size: 24px; margin-bottom: 5px; }
        .header .subtitle { font-size: 12px; opacity: 0.9; }
        .container { padding: 20px; }
        .stats { display: flex; justify-content: space-around; margin: 20px 0; }
        .stat-box { text-align: center; padding: 15px; background: #f8f9fa; border-radius: 8px; flex: 1; margin: 0 10px; }
        .stat-number { font-size: 32px; font-weight: bold; color: #667eea; }
        .stat-label { font-size: 12px; color: #666; text-transform: uppercase; }
        .section-title { font-size: 18px; color: #667eea; border-bottom: 2px solid #667eea; padding-bottom: 8px; margin: 20px 0 15px; }
        table { width: 100%; border-collapse: collapse; margin: 15px 0; }
        th { background: #667eea; color: white; padding: 10px; text-align: left; font-size: 12px; }
        td { padding: 8px; border-bottom: 1px solid #ddd; font-size: 11px; }
        tr:hover { background: #f8f9fa; }
        .badge { padding: 4px 8px; border-radius: 4px; font-size: 10px; font-weight: bold; }
        .badge-pendiente { background: #ffc107; color: #000; }
        .badge-completado { background: #28a745; color: white; }
        .badge-procesando { background: #17a2b8; color: white; }
        .footer { text-align: center; padding: 15px; color: #999; font-size: 10px; border-top: 1px solid #eee; margin-top: 30px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>REPORTE POR ESTADO DE ANÁLISIS</h1>
        <div class="subtitle">Generado el {{ date('d/m/Y H:i:s') }}</div>
    </div>

    <div class="container">
        <div class="stats">
            @foreach($estados as $estado)
            <div class="stat-box">
                <div class="stat-number">{{ $estado->total }}</div>
                <div class="stat-label">{{ ucfirst($estado->estado) }}</div>
            </div>
            @endforeach
        </div>

        @foreach($imagenesPorEstado as $estado => $analisis)
        <div class="section-title">{{ ucfirst($estado) }} ({{ $analisis->count() }})</div>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Imagen</th>
                    <th>Resultado</th>
                    <th>Fecha Análisis</th>
                </tr>
            </thead>
            <tbody>
                @foreach($analisis as $item)
                <tr>
                    <td><strong>{{ $item->cod_analisis }}</strong></td>
                    <td>{{ $item->imagen->nombre_original ?? 'N/A' }}</td>
                    <td>{{ ucfirst($item->resultado) }}</td>
                    <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endforeach
    </div>

    <div class="footer">
        Sistema de Verificación de Imágenes | Reporte generado automáticamente
    </div>
</body>
</html>
