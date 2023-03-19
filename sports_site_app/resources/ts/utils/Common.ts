export const generateUniqueKey = () => {
  const randomString = Math.random().toString(36).substring(2, 15);
  const timestamp = new Date().getTime();
  const uniqueString = `${randomString}_${timestamp}`;

  return uniqueString;
}
