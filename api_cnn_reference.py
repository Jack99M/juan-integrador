"""
api_cnn.py — Servicio de análisis de imágenes
Integración: Laravel → FastAPI → EfficientNet-B0

Ejecutar con:
    uvicorn api_cnn:app --host 0.0.0.0 --port 8001 --reload
"""

from fastapi import FastAPI, UploadFile, File, HTTPException
from fastapi.responses import JSONResponse
from tensorflow.keras.applications.efficientnet import preprocess_input
import tensorflow as tf
import numpy as np
import io
from PIL import Image as PILImage

app = FastAPI(
    title="Sistema CNN — Detección de Manipulación de Imágenes",
    description="Prototipo 1 — UNIFRANZ La Paz 2026",
    version="1.0.0"
)

# ── Carga del modelo al iniciar el servidor ───────────────────────────────────
MODEL_PATH = "models/best_finetune_model.keras"
IMG_SIZE   = 224

try:
    model = tf.keras.models.load_model(MODEL_PATH)
    print(f"✅ Modelo cargado: {MODEL_PATH}")
except Exception as e:
    raise RuntimeError(f"No se pudo cargar el modelo: {e}")


def preprocess_bytes(image_bytes: bytes):
    img = PILImage.open(io.BytesIO(image_bytes)).convert("RGB")
    img = img.resize((IMG_SIZE, IMG_SIZE))
    arr = np.array(img, dtype=np.float32)
    arr = preprocess_input(arr)
    return np.expand_dims(arr, 0)


@app.post("/analizar", summary="Analiza una imagen en busca de manipulaciones")
async def analizar_imagen(file: UploadFile = File(...)):
    if not file.content_type.startswith("image/"):
        raise HTTPException(status_code=400, detail="El archivo debe ser una imagen.")

    image_bytes = await file.read()
    img_array   = preprocess_bytes(image_bytes)

    prob  = float(model(img_array, training=False).numpy()[0][0])
    label = int(prob >= 0.5)

    return JSONResponse({
        "archivo"      : file.filename,
        "probabilidad" : round(prob, 4),
        "manipulada"   : bool(label),
        "veredicto"    : "MANIPULADA" if label else "AUTÉNTICA",
        "confianza_pct": round(max(prob, 1 - prob) * 100, 1),
    })


@app.get("/salud", summary="Health check")
async def health():
    return {"estado": "activo", "modelo": MODEL_PATH, "version": "1.0.0"}