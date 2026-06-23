<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte por Formato</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #333; line-height: 1.6; }
        .header { background: linear-gradient(135deg, #28a745 0%, #20c997 100%); color: white; padding: 30px; text-align: center; }
        .header h1 { font-size: 24px; margin-bottom: 5px; }
        .header .subtitle { font-size: 12px; opacity: 0.9; }
        .container { padding: 20px; }
        .stats { display: flex; justify-content: space-around; margin: 20px 0; flex-wrap: wrap; }
        .stat-box { text-align: center; padding: 15px; background: #f8f9fa; border-radius: 8px; margin: 10px; min-width: 120px; }
        .stat-number { font-size: 32px; font-weight: bold; color: #28a745; }
        .stat-label { font-size: 12px; color: #666; text-transform: uppercase; }
        .section-title { font-size: 18px; color: #28a745; border-bottom: 2px solid #28a745; padding-bottom: 8px; margin: 20px 0 15px; }
        table { width: 100%; border-collapse: collapse; margin: 15px 0; }
        th { background: #28a745; color: white; padding: 10px; text-align: left; font-size: 12px; }
        td { padding: 8px; border-bottom: 1px solid #ddd; font-size: 11px; }
        tr:hover { background: #f8f9fa; }
        .footer { text-align: center; padding: 15px; color: #999; font-size: 10px; border-top: 1px solid #eee; margin-top: 30px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>REPORTE POR FORMATO DE IMAGEN</h1>
        <div class="subtitle">Generado el {{ date('d/m/Y H:i:s') }}</div>
    </div>

    <div class="container">
        <div class="stats">
            @if($formatos->count() > 0)
                @foreach($formatos as $formato)
                <div class="stat-box">
                    <div class="stat-number">{{ $formato->total }}</div>
                    <div class="stat-label">
                        @php
                            $tipoFormato = strtoupper(str_replace('image/', '', $formato->mime ?? 'DESCONOCIDO'));
                            if ($tipoFormato === 'JPEG') $tipoFormato = 'JPG';
                        @endphp
                        {{ $tipoFormato }}
                    </div>
                </div>
                @endforeach
            @else
                <p style="text-align: center; color: #666;">No hay imágenes con formato registrado</p>
            @endif
        </div>

        @if($imagenesPorFormato->count() > 0)
            @foreach($imagenesPorFormato as $mime => $imagenes)
            @php
                $tipoFormato = strtoupper(str_replace('image/', '', $mime ?? 'DESCONOCIDO'));
                if ($tipoFormato === 'JPEG') $tipoFormato = 'JPG';
            @endphp
            <div class="section-title">{{ $tipoFormato }} ({{ $imagenes->count() }} imágenes)</div>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Tamaño</th>
                    <th>Estado</th>
                    <th>Fecha Subida</th>
                </tr>
            </thead>
            <tbody>
                @foreach($imagenes as $imagen)
                <tr>
                    <td><strong>{{ $imagen->cod_imagen }}</strong></td>
                    <td>{{ Str::limit($imagen->nombre_original, 30) }}</td>
                    <td>{{ number_format(($imagen->tamano ?? 0) / 1024, 2) }} KB</td>
                    <td>{{ ucfirst($imagen->estado) }}</td>
                    <td>{{ $imagen->created_at->format('d/m/Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endforeach
        @else
        <p style="text-align: center; padding: 20px; color: #666;">No hay imágenes para mostrar</p>
        @endif
    </div>

    <div class="footer">
        Sistema de Verificación de Imágenes | Reporte generado automáticamente
    </div>
</body>
</html>
