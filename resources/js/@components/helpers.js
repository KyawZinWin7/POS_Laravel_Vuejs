let app = {}

app.getErrors = (err) => {
  if (err.response.status === 422) {
    const p = err.response.data.errors
    const errors = {}
    for (const key in p) {
      errors[key] = p[key][0]
    }
    return errors
  }
  return err.response.data.message
}

export default app
