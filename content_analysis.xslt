<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0" xmlns:map="urn:yahoo:cate">
  <xsl:template match="/">
    <adjunctcontainer>
      <adjunct id="smid:{$smid}" version="1.0">
        <xsl:for-each select="map:ResultSet/map:Result">
          <meta property="dc:description"><xsl:value-of select="current()" /></meta>
        </xsl:for-each>
      </adjunct>
    </adjunctcontainer>
  </xsl:template>
</xsl:stylesheet>
