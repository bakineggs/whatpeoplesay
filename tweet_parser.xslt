<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0" xmlns:Atom="http://www.w3.org/2005/Atom">
  <xsl:template match="/">
    <adjunctcontainer>
      <adjunct id="smid:{$smid}" version="1.0">
        <xsl:for-each select="Atom:feed/Atom:entry">
          <meta property="dc:creator"><xsl:value-of select="Atom:author/Atom:name" /></meta>
          <meta property="dc:description"><xsl:value-of select="Atom:title" /></meta>
        </xsl:for-each>
      </adjunct>
    </adjunctcontainer>
  </xsl:template>
</xsl:stylesheet>
