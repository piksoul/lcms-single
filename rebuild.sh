#!/usr/bin/env bash
set -e

echo "📥 Pulling latest changes..."
git pull origin main

echo "📦 Running build..."
npm run build

echo "➕ Staging changes..."
git add .

echo "📝 Committing..."
git commit -m "rebuild css"

echo "🚀 Pushing to main..."
git push origin main

echo "✅ Done!"
