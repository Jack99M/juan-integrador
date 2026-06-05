<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte {{ $reporte->cod_reporte }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #333; line-height: 1.6; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 40px 30px; text-align: center; }
        .header h1 { font-size: 28px; margin-bottom: 10px; font-weight: 600; }
        .header .subtitle { font-size: 14px; opacity: 0.9; }
        .container { padding: 30px; }
        .section { margin-bottom: 40px; }
        .section-title { font-size: 20px; color: #667eea; border-bottom: 3px solid #667eea; padding-bottom: 10px; margin-bottom: 20px; font-weight: 600; }
        .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; background: #f8f9fa; padding: 20px; border-radius: 8px; }
        .info-item { padding: 10px; }
        .info-label { font-weight: 600; color: #667eea; font-size: 12px; text-transform: uppercase; margin-bottom: 5px; }
        .info-value { font-size: 14px; color: #333; }
        .image-container { text-align: center; margin: 20px 0; }
        .image-container img { max-width: 100%; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .image-label { font-size: 16px; font-weight: 600; color: #555; margin-bottom: 15px; }
        .legend { background: #f8f9fa; padding: 20px; border-radius: 8px; margin-top: 20px; }
        .legend-title { font-size: 16px; font-weight: 600; margin-bottom: 15px; color: #333; }
        .legend-items { display: flex; justify-content: space-around; flex-wrap: wrap; }
        .legend-item { display: flex; align-items: center; margin: 5px 10px; }
        .color-box { width: 30px; height: 30px; border-radius: 4px; margin-right: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .legend-text { font-size: 13px; color: #555; }
        .exif-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
        .exif-item { background: white; padding: 15px; border-left: 4px solid #667eea; border-radius: 4px; }
        .footer { text-align: center; padding: 20px; color: #999; font-size: 12px; border-top: 1px solid #eee; margin-top: 40px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>REPORTE DE ANÁLISIS FORENSE DIGITAL</h1>
        <div class="subtitle">{{ $reporte->cod_reporte }} | {{ $reporte->created_at->format('d/m/Y H:i') }}</div>
    </div>

    <div class="container">
        <div class="section">
            <div class="section-title">Información General</div>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Archivo de Imagen</div>
                    <div class="info-value">{{ $reporte->imagen->nombre_original }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Código de Imagen</div>
                    <div class="info-value">{{ $reporte->imagen->cod_imagen }}</div>
                </div>
                @if($reporte->usuario)
                <div class="info-item">
                    <div class="info-label">Analista Responsable</div>
                    <div class="info-value">{{ $reporte->usuario->nombre }} {{ $reporte->usuario->apellido_paterno }}</div>
                </div>
                @endif
                <div class="info-item">
                    <div class="info-label">Fecha de Generación</div>
                    <div class="info-value">{{ $reporte->created_at->format('d/m/Y H:i:s') }}</div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Imagen Original</div>
            <div class="image-container">
                <img src="{{ $imagenOriginalPath }}" alt="Imagen Original">
            </div>
        </div>

        <div class="section">
            <div class="section-title">Análisis de Manipulación - Mapa de Calor</div>
            <div class="image-container">
                <img src="{{ $heatmapPath }}" alt="Mapa de Calor">
            </div>
            <div class="legend">
                <div class="legend-title">Interpretación del Mapa de Calor</div>
                <div class="legend-items">
                    <div class="legend-item">
                        <div class="color-box" style="background: #ff0000;"></div>
                        <div class="legend-text">Alta Probabilidad</div>
                    </div>
                    <div class="legend-item">
                        <div class="color-box" style="background: #ffa500;"></div>
                        <div class="legend-text">Media-Alta</div>
                    </div>
                    <div class="legend-item">
                        <div class="color-box" style="background: #ffff00;"></div>
                        <div class="legend-text">Media</div>
                    </div>
                    <div class="legend-item">
                        <div class="color-box" style="background: #00ff00;"></div>
                        <div class="legend-text">Baja</div>
                    </div>
                </div>
            </div>
        </div>

        @if($datosExif)
        <div class="section">
            <div class="section-title">Metadatos EXIF</div>
            <div class="exif-grid">
                <div class="exif-item">
                    <div class="info-label">Código EXIF</div>
                    <div class="info-value">{{ $datosExif->cod_exif }}</div>
                </div>
                @if($datosExif->fabricante_camara)
                <div class="exif-item">
                    <div class="info-label">Fabricante</div>
                    <div class="info-value">{{ $datosExif->fabricante_camara }}</div>
                </div>
                @endif
                @if($datosExif->modelo_camara)
                <div class="exif-item">
                    <div class="info-label">Modelo de Cámara</div>
                    <div class="info-value">{{ $datosExif->modelo_camara }}</div>
                </div>
                @endif
                @if($datosExif->software)
                <div class="exif-item">
                    <div class="info-label">Software</div>
                    <div class="info-value">{{ $datosExif->software }}</div>
                </div>
                @endif
                @if($datosExif->fecha_captura)
                <div class="exif-item">
                    <div class="info-label">Fecha de Captura</div>
                    <div class="info-value">{{ $datosExif->fecha_captura->format('d/m/Y H:i:s') }}</div>
                </div>
                @endif
            </div>
        </div>
        @endif
    </div>

    <div class="footer">
        Sistema de Verificación de Imágenes | Reporte generado automáticamente
    </div>
</body>
</html>
