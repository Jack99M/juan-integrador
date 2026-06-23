<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte por Periodo</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #333; line-height: 1.6; }
        .header { background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%); color: white; padding: 30px; text-align: center; }
        .header h1 { font-size: 24px; margin-bottom: 5px; }
        .header .subtitle { font-size: 12px; opacity: 0.9; }
        .container { padding: 20px; }
        .period { text-align: center; background: #e7d9ff; padding: 15px; border-radius: 8px; margin: 15px 0; }
        .stats { display: flex; justify-content: space-around; margin: 20px 0; }
        .stat-box { text-align: center; padding: 15px; background: #f8f9fa; border-radius: 8px; flex: 1; margin: 0 10px; }
        .stat-number { font-size: 32px; font-weight: bold; color: #6f42c1; }
        .stat-label { font-size: 12px; color: #666; text-transform: uppercase; }
        .section-title { font-size: 18px; color: #6f42c1; border-bottom: 2px solid #6f42c1; padding-bottom: 8px; margin: 20px 0 15px; }
        table { width: 100%; border-collapse: collapse; margin: 15px 0; }
        th { background: #6f42c1; color: white; padding: 10px; text-align: left; font-size: 12px; }
        td { padding: 8px; border-bottom: 1px solid #ddd; font-size: 11px; }
        tr:hover { background: #f8f9fa; }
        .badge { padding: 4px 8px; border-radius: 4px; font-size: 10px; font-weight: bold; }
        .badge-manipulada { background: #dc3545; color: white; }
        .badge-limpia { background: #28a745; color: white; }
        .footer { text-align: center; padding: 15px; color: #999; font-size: 10px; border-top: 1px solid #eee; margin-top: 30px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>REPORTE POR PERIODO PERSONALIZADO</h1>
        <div class="subtitle">Generado el {{ date('d/m/Y H:i:s') }}</div>
    </div>

    <div class="container">
        <div class="period">
            <strong>Periodo:</strong> {{ $fechaInicio->format('d/m/Y') }} - {{ $fechaFin->format('d/m/Y') }}
        </div>

        <div class="stats">
            <div class="stat-box">
                <div class="stat-number">{{ $stats['total'] }}</div>
                <div class="stat-label">Total</div>
            </div>
            <div class="stat-box">
                <div class="stat-number">{{ $stats['limpias'] }}</div>
                <div class="stat-label">Limpias</div>
            </div>
            <div class="stat-box">
                <div class="stat-number">{{ $stats['manipuladas'] }}</div>
                <div class="stat-label">Manipuladas</div>
            </div>
        </div>

        @if($imagenes->count() > 0)
        <div class="section-title">Imágenes Analizadas</div>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Formato</th>
                    <th>Resultado</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($imagenes as $imagen)
                <tr>
                    <td><strong>{{ $imagen->cod_imagen }}</strong></td>
                    <td>{{ Str::limit($imagen->nombre_original, 30) }}</td>
                    <td>{{ strtoupper($imagen->formato) }}</td>
                    <td>
                        @php
                            $resultado = $imagen->analisis->first()->resultado ?? 'pendiente';
                        @endphp
                        <span class="badge badge-{{ $resultado }}">{{ ucfirst($resultado) }}</span>
                    </td>
                    <td>{{ $imagen->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div style="text-align: center; padding: 40px; background: #f8f9fa; border-radius: 8px;">
            <p style="color: #666; font-size: 16px;">No se encontraron imágenes en el periodo seleccionado</p>
        </div>
        @endif
    </div>

    <div class="footer">
        Sistema de Verificación de Imágenes | Reporte generado automáticamente
    </div>
</body>
</html>
